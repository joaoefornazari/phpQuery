# *phpQuery*
The  PHP DOM Manipulation toolkit.

## Motivation

I'm working currently with PHP, and I've missed using something like jQuery in PHP to manipulate the DOM. Therefore, I started doing it by myself. I'll improve this, step by step, to make it look like JavaScript's jQuery.

## Context

There's a main PHP HTML document ```mainDoc``` that calls another PHP document ```anotherDoc``` to populate it.
As we use either ```print``` or ```echo``` for returning strings to a PHP GET require, ```anotherDoc``` uses ***phpQuery*** to create HTML elements and return it to ```mainDoc```. This is a more tidy-up way I found to do it instead of passing raw HTML strings to variables and concatenating it.

## Current status

It looks more like Java than with JavaScript 😂

The main class created here that serves for basic uses, like creating headers and stuff, is the ```DOM_Element```.
You create it inputting the HTML item **type** you're creating (such as ```h2``` or ```img```), an array of **attributes** (like ```style``` or ```class```), in *name-value* order, and the element's **content** (such as text or other stuff).

It has *get* and *set* methods as OOP requires, so you can get the attributes array and the content quite easily.

To render it on the browser, every ```DOM_Element``` has a function ```constructHTML()``` where it returns a String ```<type attr="value">content</type>```.
