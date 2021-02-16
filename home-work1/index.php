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

$num = 117;
// $numBin = decimToBinary($num);
// echo $numBin . '<br>';
// $numDec = binarToDecimal($numBin);
// echo 'Введенное число - ' . $num . ' было преобразовано в бинарное - ' . $numBin . ' далее обратно в десятичное - ' . $numDec . '<br>';


// ------Написать функцию которая выводит первые N чисел фибоначчи----------
function fibonachi($N, $val1, $val2)
{
  $arrFib = [];
  for ($i = 1; $i <= $N; $i++) {
    $sum = $val1 + $val2;
    $arrFib[] = $sum;
    $val1 = $val2;
    $val2 = $sum;
  }

  return $arrFib;
}
// echo '<pre>';
// print_r(fibonachi(4, 5, 7));
// echo '</pre>';


//-----------Написать функцию, возведения числа N в степень M --------
function degree($n, $m)
{
  $nDegree = $n;
  for ($i = 1; $i < $m; $i++) {
    $nDegree *= $n;
  }
  return $nDegree;
}
$n = 2;
$m = 3;
// echo degree($n, $m);

//Написать функцию которая вычисляет входит ли IP-адрес в диапазон указанных IP-адресов. Вычислить для версии ipv4.
// Валидация вводимого IP
function validIp($ip)
{
  $lengIpMax = 15;
  $lengIpMin = 7;

  // Проверяем, соответсвует ли длинна переданого IP допустимой длинне строки
  if ((strlen($ip) >= $lengIpMin) && (strlen($ip) <= $lengIpMax)) {
    $ip = explode('.', $ip);

    //Проверяем, состоит ли массив чисел IP из 4-х элементов
    if (count($ip) != 4) {
      return false;
    } else {

      //Проверяем, является ли соответствущий элемент массива IP коректным
      foreach ($ip as $val) {
        if (!is_numeric($val) || ($val < 0) || ($val >= 255)) {
          return false;
        }
      }
    }
  } else {
    return false;
  }
  return true;
}


function ipExists($ip, $ipMin, $ipMax)
{
  if (validIp($ip) && validIp($ipMin) && validIp($ipMax)) {
    $arrIp = explode('.', $ip);
    $arrIpMin = explode('.', $ipMin);
    $arrIpMax = explode('.', $ipMax);

    for ($i = 0; $i < 4 ; $i++) { 
      if (($arrIp[$i] > $arrIpMin[$i]) && ($arrIp[$i] < $arrIpMax[$i])) {
        return true;
      } elseif (($arrIp[$i] == $arrIpMin[$i]) || ($arrIp[$i] == $arrIpMax[$i])) {
        if ($i == 3) {
          return true;
        }
        continue;   
      } else {
        return 'IP not included in the specified range';
      }
    }

  } else {
    return 'Error, IP not valid';
  }
}

$ipMin =  '11.112.75.113';
$ipMax = '205.25.14.211';
$ip = '205.25.14.211';

echo ipExists($ip, $ipMin, $ipMax);



//Для одномерного массива:
//  Подсчитать процентное соотношение положительных/отрицательных/нулевых/простых чисел

$arrNumber = [5, 7, 95, -8, 0, 13, -35, 107, 0, 17, -24];

// ------ Определение, является ли число простым
function isPrime($num)
{
  if ($num > 1) {
    // Получаем квадратный корень из переданного числа
    $highestIntegralSquareRoot = floor(sqrt($num));
    // Ищем совпадение делителя до квадратного корня из переданного числа
    for ($i = 2; $i <= $highestIntegralSquareRoot; $i++) {
      if ($num % $i == 0) {
        return false;
      }
    }
    return true;
  }
  return 'Error number';
}

//
function arrInfo($arrNumber)
{
  if (count($arrNumber) > 0) {
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
  } else {
    return 'The array contains nothing.';
  }
}

// echo '<pre>';
// print_r(arrInfo($arrNumber));
// echo '</pre>';



//  Отсортировать элементы по возрастанию/убыванию
function minSort($arrNumber)
{
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
$matrix = [
  [5, 7, 9, -3, 0, 14],
  [9, 54, 7, -3, 0, 14],
  [56, 2, 6, -7, -54, 19],
];

function transposeMatrix($matrix)
{
  for ($i = 0, $count = count($matrix);  $i < $count; $i++) {
    for ($j = 0, $countArrI = count($matrix[$i]); $j < $countArrI; $j++) {
      $arrTr[$j][] = $matrix[$i][$j];
    }
  }

  return $arrTr;
}
// echo '<pre>';
// print_r(transposeMatrix($matrix));
// echo '</pre>';

//--------------Умножить две матрицы------------
$matrix1 = [
  [5, 7],
  [9, 54],
  [56, 2],
];
$matrix2 = [
  [5, 7, 9],
  [9, 54, 7],
];

function matrixmult($matrix1, $matrix2)
{
  $row = count($matrix1);
  $column = count($matrix2[0]);
  $coutM2 = count($matrix2);
  if (count($matrix1[0]) != $coutM2) {
    return 'Несоответсвующие размеры матриц!';
  }
  $matrix3 = [];
  for ($i = 0; $i < $row; $i++) {
    for ($j = 0; $j < $column; $j++) {
      $matrix3[$i][$j] = 0;
      for ($k = 0; $k < $coutM2; $k++) {
        $matrix3[$i][$j] += $matrix1[$i][$k] * $matrix2[$k][$j];
      }
    }
  }
  return ($matrix3);
}

echo '<pre>';
print_r(matrixmult($matrix1, $matrix2));
echo '</pre>';


//Удалить те строки, в которых сумма элементов положительна и присутствует хотя бы один нулевой элемент. Аналогично для столбцов.
function delStrPosSummEndNull($arr)
{
  $countArr = count($arr);
  for ($i = 0; $i < $countArr; $i++) {
    $sumArrI = 0;
    foreach ($arr[$i] as $val) {
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

function arrInfoEl($arr)
{
  foreach ($arr as $val) {
    if (is_array($val)) {
      arrInfoEl($val);
    } else {
      echo 'El: ' . $val . '<br>';
    }
  }
}

// arrInfoEl($arrArr);