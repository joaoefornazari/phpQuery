<?php

    # Classe auxiliar para criar elementos HTML sem ser tão "cru".

    class DOM_Element {

			private String $type = "";
			private Array $propList = [];
			private $content = "";

			public function __construct($type, $propList = [], $content = "") {
				$this->type = $type;
				$this->propList = $propList;
				$this->content = $content;
			}

			public function getType() {
				return $this->type;
			}

			public function setType($type) {
				$this->type = $type;
			}

			public function addProp($propName, $value) {
				array_combine($this->propList, [$propName, $value]);
			}

			public function getPropValue($propName) {
				for ($i = 0; $i < count($this->propList); $i += 1) {
						if (strcmp($this->propList[$i][0], $propName) == 0) {
								return $this->propList[$i][1];
						}
				}
			}

			public function getAllProps() {
				$allProps = "";
				for ($i = 0; $i < count($this->propList); $i += 2) {
						$allProps = $allProps . $this->propList[$i] . '="' .
								$this->propList[$i + 1] . '" ';
				}
				$allPropsLength = strlen($allProps);
				$allProps = substr($allProps, 0, $allPropsLength - 1);
				return $allProps;
			}

			public function getContent() {
				return $this->content;
			}

			public function setContent($content) {
				$this->content = $content;
			}

			# Pode ser que precise ser sobrescrita em alguns casos, como img.
			public function constructHTML() {
				$tagStart = "<";
				$tagEnd = ">";
				$tagSlashStart = "</";
				$space = " ";

				$htmlElement = $tagStart . $this->getType();

				if (count($this->propList) > 0) {
					$htmlElement .= $space . $this->getAllProps() .  $tagEnd;
				} else {
					$htmlElement .= $tagEnd;
				}
				
				if (strcmp($this->getContent(), "") != 0) {
					$htmlElement .= $this->getContent();
				}

				$htmlElement .=  $tagSlashStart . $this->getType() .  $tagEnd;

				return $htmlElement;
			}

    }

		# classe para criar tabelas HTML mais rápido.

		class DOM_Table extends DOM_Element{

			private $table = [[]];

			/**
			 * Constrói uma tabela HTML com os nomes das colunas.
			 */
			public function __construct($propList = [], $columnsNames = []) {
				$this->type = "table";
				$this->propList = $propList;

				$table = $this->getTable();
				
				foreach($columnsNames as &$name) {
					array_push($table[0], new DOM_Element("th", [], ""));
				}
				array_merge($table, []);

				$this->setTable($table);
			}

			public function getTable() {
				return $this->table;
			}

			public function setTable($table) {
				$this->table = $table;
			}

			/**
			 * Adds a Node to a HTML Table. Calling it "column"
			 * because the table is tidied as a matrix.
			 */
			public function addColumn($columnContent) {
				$table = $this->getTable();
				$row = count($table);
				array_push($table[$row-1], new DOM_Element("td", [], $columnContent));
				$this->setTable($table);
			}

			public function addRow() {
				array_merge($this->table, []);
			}

			public function constructHTML() {
				$tagStart = "<";
				$tagEnd = ">";
				$tagSlashStart = "</";

				$tableRow = "tr";

				$tableHTML = $tagStart . $this->getType();

				if (count($this->propList) > 0) {
					$tableHTML .= " " . $this->getAllProps() .  $tagEnd;
				} else {
					$tableHTML .= $tagEnd;
				}

				foreach($this->getTable() as &$row) {
					$tableHTML .= $tagStart . $tableRow . $tagEnd;
					foreach($row as &$column) {
						$tableHTML .= $column->constructHTML();
					}
					$tableHTML .= $tagSlashStart . $tableRow . $tagEnd;
				}

				$tableHTML .= $tagSlashStart . $this->getType() . $tagEnd;

				return $tableHTML;
			}
		}

?>