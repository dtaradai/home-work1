<?php

//Написать функцию которая по параметрам принимает число из десятичной системы счисления и преобразовывает в двоичную. Написать функцию которая выполняет преобразование наоборот.
function decimToBinary($decimal)
{
  if ($decimal == 0) {
    return '0';
  } elseif (is_int($decimal) && ($decimal > 0)) {
    $binar = '';
    $revers = '';

    while ($decimal >= 1) {
      $binar .= $decimal % 2;
      $decimal /= 2;
    }

    for ($i = strlen($binar); $i >= 0; $i--) {
      $revers .= substr($binar, $i, 1);
    }
    return $revers;
  } else {
    return 'Введите пожалуйста положительное число';
  }
}

function binarToDecimal($binar)
{
  $num = 0;
  $binarLeng = strlen($binar);

  for ($i = 0; $i < $binarLeng; $i++) {
    $num += substr($binar, $i, 1) * (2 ** ($binarLeng - 1 - $i));
  }
  return $num;
}

$num = 7;
$numBin = decimToBinary($num);
// echo $numBin . '<br>';
// $numDec = binarToDecimal($numBin);
// echo 'Введенное число - ' . $num . ' было преобразовано в бинарное - ' . $numBin . ' далее обратно в десятичное - ' . $numDec . '<br>';


// ------Написать функцию которая выводит первые N чисел фибоначчи----------
function fibonachi($col, $val1 = 1, $val2 = 1)
{
  for ($i = 2; $i <= $col; $i++) {
    $fib = $val1 + $val2;
    $val1 = $val2;
    $val2 = $fib;
  }
  return $fib;
}
// echo fibonachi(4);


//-----------Написать функцию, возведения числа N в степень M --------
function degree($n, $m)
{
  return $n ** $m;
}
$n = 2;
$m = 3;
// echo degree($n, $m);

//Написать функцию которая вычисляет входит ли IP-адрес в диапазон указанных IP-адресов. Вычислить для версии ipv4.

$ipArr = [
  '192.168.0.3',
  '192.168.0.12',
  '192.168.15.3',
  '192.168.0.17',
  '192.168.0.29',
  '192.168.134.3',
  '192.168.111.3',
  '192.168.245.3',
];

function ipExists($ip, $arrIp)
{
  $arrLeng = count($arrIp);
  for ($i = 0; $i < $arrLeng; $i++) {
    if ($arrIp[$i] == $ip) {
      return true;
    }
  }
  return false;
}
// echo ipExists('192.168.134.3', $ipArr);



//Для одномерного массива:
//  Подсчитать процентное соотношение положительных/отрицательных/нулевых/простых чисел

$arrNumber = [5, 7, 95, -8, 0, 13, -35, 107, 0, 17, -24];

// ------ Определение, является ли число простым
function isPrime($num)
{
  $highestIntegralSquareRoot = floor(sqrt($num));

  for ($i = 2; $i <= $highestIntegralSquareRoot; $i++) {
    if ($num % $i == 0) {
      return false;
    }
  }
  return true;
}

//
function arrInfo($arrNumber)
{
  $params = [];
  $positiveNum = 0;
  $negativeNum = 0;
  $nullNum = 0;
  $primeNum = 0;
  $colNumber = count($arrNumber);

  for ($i = 0; $i < $colNumber; $i++) {
    if ($arrNumber[$i] < 0) {
      $negativeNum++;
    }
    if ($arrNumber[$i] > 0) {
      $positiveNum++;
      if (($arrNumber[$i] >= 2) && isPrime($arrNumber[$i])) {
        $primeNum++;
      }
    }
    if ($arrNumber[$i] == 0) {
      $nullNum++;
    }
  }

  if ($positiveNum > 0) {
    $percentagePositiv = ($positiveNum / $colNumber * 100);
    $params['percentagePositiv'] = $percentagePositiv;
  }
  if ($negativeNum > 0) {
    $percentageNegativ = ($negativeNum / $colNumber * 100);
    $params['percentageNegativ'] = $percentageNegativ;
  }
  if ($primeNum > 0) {
    $percentagePrime = ($primeNum / $colNumber * 100);
    $params['percentagePrime'] = $percentagePrime;
  }
  if ($nullNum > 0) {
    $percentageNull = ($nullNum / $colNumber * 100);
    $params['percentageNull'] = $percentageNull;
  }

  return $params;
}

// echo '<pre>';
// print_r(arrInfo($arrNumber));
// echo '</pre>';



//  Отсортировать элементы по возрастанию/убыванию
function minSort($arrNumber) {
  $arrSort = [];
  while (count($arrNumber)) {

    foreach ($arrNumber as $i => $v) {
      if ($v == min($arrNumber)) {
        $arrSort[] = $v;
        unset($arrNumber[$i]);
        break;
      }
    }
  }

  return $arrSort;
}

// echo '<pre>';
// print_r(minSort($arrNumber));
// echo '</pre>';



//-----------Для двумерных массивов-----------
//------------Транспонировать матрицу----------
$arr = [
  [5, 7, 9, -3, 0, 14],
  [9, 54, 7],
  [56, 2, 6, -7, -54, 19, -101, -4],
];

function transposeMatrix($arr) {
  $countArr = count($arr);

  for ($i = 0; $i < $countArr; $i++) {
    $countArrI = count($arr[$i]);

    for ($j = 0; $j < $countArrI; $j++) { 
      $arrTr[$j][] = $arr[$i][$j];
    }

  }

  return $arrTr;
}
// echo '<pre>';
// print_r(transposeMatrix($arr));
// echo '</pre>';

//--------------Умножить две матрицы------------
$arr1 = [
  [5, 7],
  [9, 54],
  [56, 2],
];
$arr2 = [
  [5, 7, 9],
  [9, 54, 7],
];

function matrixmult($m1, $m2) {
  $row = count($m1);
  $column = count($m2[0]);
  $p = count($m2);
  if (count($m1[0]) != $p) {
    return 'Несоответсвующие размеры матриц!';
  }
  $m3 = [];
  for ($i = 0; $i < $row; $i++) {
      for ($j = 0; $j < $column; $j++) {
          $m3[$i][$j] = 0;
          for ($k = 0; $k < $p; $k++) {
              $m3[$i][$j] += $m1[$i][$k] * $m2[$k][$j];
          }
      }
  }
  return($m3);
}

// echo '<pre>';
// print_r(matrixmult($arr1, $arr2));
// echo '</pre>';


//Удалить те строки, в которых сумма элементов положительна и присутствует хотя бы один нулевой элемент. Аналогично для столбцов.
function delStrPosSummEndNull($arr) {
  $countArr = count($arr);
  for ($i = 0; $i < $countArr; $i++) { 
    $sumArrI = 0;
    foreach($arr[$i] as $val) {
      $sumArrI += $val;
      if ($val == 0) {
        $arrNull = true;
      }
    }
    if (($sumArrI > 0) && $arrNull) {
      unset($arr[$i]);
    }
    unset($arrNull);
  }
  return $arr;
}
// echo '<pre>';
// print_r(delStrPosSummOrNull($arr));
// echo '</pre>';


//рекурсивная функци которая будет обходить и выводить все значения любого массива и любого уровня вложенности
$arrArr = [
  [5, 7, 9, -3, 0, 14],
  [9, 54, 7],
  [
    ['php', 'js', 'pyton', 'c++'],
    ['html', 'scc', 'scss', 'sass']
  ],
];

function arrInfoEl($arr) {
  foreach ($arr as $val) {
    if (is_array($val)) {
      arrInfoEl($val);
    } else {
      echo 'El: ' . $val . '<br>' ;
    }
  }
}

// arrInfoEl($arrArr);