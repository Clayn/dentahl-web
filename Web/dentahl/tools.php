<?php

/*
 * The MIT License
 *
 * Copyright 2019 Clayn <clayn_osmato@gmx.de>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

function openConnection($charset = "utf8mb4") {
    include_once __DIR__ . '/config.php';
    $config = getDBConfiguration();
    $mysqli = new mysqli($config->url, $config->user, $config->password, $config->database);
    \mysqli_set_charset($mysqli, $charset);
    return $mysqli;
}

function map_to_ninja($result) {
    $id = $result['id'];
    $name = $result['name'];
    $image = $result['image'];
    $element = $result['element'];
    $main = $result['main'];
    return new Ninja($name, $image, $id, $element, $main);
}

function map_to_element($row) {
    $id = $row['id'];
    $name = $row['name'];
    $image = $row['image'];
    return new Element($name, $image, $id);
}
