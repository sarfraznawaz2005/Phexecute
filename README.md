## Introduction ##

Phexecute is browser-based tool to quickly test/run PHP code. It comes with ability to easily check your code with [PHP Code_Sniffer][1], run **PHPUnit** or **SimpleTest** tests and more, all **inside the browser**. Phexecute can dramatically improve development time when something needs to be tested. Extending Phexecute to add your own packages/modules is also extremely easy.

## Features ##

 - PHP Code_Sniffer to easily identify and fix problematic parts of code (through PSR-2)
 - Run PHPUnit tests and see results right inside browser
 - Run SimpleTest tests
 - Uses Symfony VarDumper component easy visualization of vars, arrays, objects
 - Ability to save unlimited snippets
 - Live PHP error highlighting
 - Easy to extend

## Screenshots ##

Main Screen

![Main Window](https://raw.github.com/sarfraznawaz2005/phexecute/master/screenshots/main.png)

PHP Code_Sniffer Results

![CodeSniffer Window](https://raw.github.com/sarfraznawaz2005/phexecute/master/screenshots/codesniffer.png)

PHPUnit Results

![PHPUnit Window](https://raw.github.com/sarfraznawaz2005/phexecute/master/screenshots/phpunit.png)

SimpleTest Results

![SimpleTest Window](https://raw.github.com/sarfraznawaz2005/phexecute/master/screenshots/simpletest.png)

---

## Requirements ##

 - PHP 5.3 or above
 - Enabled [mod_rewrite][2] module

## Installation ##

You can [download][3] it directly OR install via composer:

`composer create-project -n -s dev sarfraznawaz2005/phexecute`

## Using Composer Packages inside Phexecute ##

Any packages that you install via composer are automatically available inside Phexecute. For example, `dump` function comes from `symfony/var-dumper` package specified in composer.json file and we can use it diretly inside Phexecute like `dump($var)`. So any packages specified in composer.json file are available for you to use them directly inside Phexecute code editor.

## Adding Custom Packages ##

Adding your own packages is extremely simple so much so that you don't need to write single line of PHP code.

By default, Phexecute has three menu items **System**, **Packages** and **Snippets**. They come from pure text files that can be found in **storage\data** folder respectively. Should you need to add your own menu entry, simply create a text file in any of those three directories and it will auto-magically appear in Phexecute menu.

The format for a text file is:

`EntryName` (This name will appear in corresponding menu)

`---`

`PHP Code` (The actual php code to run when menu entry is clicked)

`---`

`true OR false` (whether or not to run code automatically)

For example here is how `phpinfo` entry is defined (in storage/data/system/01-phpinfo.txt):

`phpinfo`

`---`

`phpinfo();`

`---`

`true`

**Note:** Please notice that extensions of those files should be **.txt** although you can name these files anything.

You can extend Phexecute to any level you want. For example, you can use it to create automation commands, deploy scripts, run git commands, etc.

Please checkout text files in directories under **storage\data** to get an idea of how default menu entries are defined.

**`CAUTION`**: Phexecute uses `eval` to run the code. It is strongly recommended that you should use it for local testing only and not on production server due to security reasons. If you do, you use it on your own risk.

## Contribute ##

Please feel free to fork and modify/extend Phexecute and send a pull request with your changes! To establish a consistent code quality, please check your code using [PHP_CodeSniffer][4]. If you find any bug, error or issue, please report it at [issue tracker][5].

## Donation?##

In order to donate, please go to [this page][6] and input email address sarfraznawaz2005@hotmail.com and proceed with your donation information. Thanks!

## License ##

The MIT License (MIT)

Copyright (c) 2015 Sarfraz Ahmed  and [Contributors][7]

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.


  [1]: https://github.com/squizlabs/PHP_CodeSniffer
  [2]: http://httpd.apache.org/docs/current/mod/mod_rewrite.html
  [3]: https://github.com/sarfraznawaz2005/Phexecute/archive/master.zip
  [4]: https://github.com/squizlabs/PHP_CodeSniffer
  [5]: https://github.com/sarfraznawaz2005/Phexecute/issues
  [6]: https://load.payoneer.com/LoadToPage.aspx
  [7]: https://github.com/sarfraznawaz2005/Phexecute/graphs/contributors
