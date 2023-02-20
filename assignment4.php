<?php 
//1.Write a PHP function to sort an array of strings by their length, in ascending order. (Hint: You can use the usort() function to define a custom sorting function.)
function sort_strings_by_length_asc($arr) {
  // sort array in ascending order
  usort($arr, function($a, $b) {
      return strlen($a) - strlen($b);
  });

  return $arr;
}

$strings = array("apple", "banana", "cherry", "date", "elderberry");
$sortedStrings = sort_strings_by_length_asc($strings);
print_r($sortedStrings);
/**
 * Example: 
 * This comparison function takes two arguments, $a and $b, which represent two elements being compared. In this case, $a and $b will be two strings from the array.

 * For example, when comparing the first two elements of the array ("apple" and "banana"), $a will be "apple" and $b will be "banana". The comparison function calculates the length of each string using strlen() and returns the difference between their lengths, which is -1 (because "apple" is shorter than "banana").

 * The comparison function is then called again to compare the second and third elements ("banana" and "cherry"), and so on. Eventually, the array will be sorted by string length in ascending order.
 */

//2.Write a PHP function to concatenate two strings, but with the second string starting from the end of the first string.
function concatenate_strings_from_end($str1, $str2) {
  $pos = strpos($str1, $str2);
  if ($pos === false) {
      // If $str2 is not found in $str1, just concatenate the strings
      return $str1 . $str2;
  } else {
      // Concatenate the first part of $str1 with $str2
      return substr($str1, 0, $pos) . $str2;
  }
}

$str1 = "hello world";
$str2 = "world";
$result = concatenate_strings_from_end($str1, $str2);
echo $result; 


//3.Write a PHP function to remove the first and last element from an array and return the remaining elements as a new array.
function remove_first_and_last_element($arr){
  // remove first element
  array_shift($arr);
  // remove last element
  array_pop($arr);

  // Return the remaining elements as a new array
  return $arr;
}

$original_array = array(1, 2, 3, 4, 5);
$new_array = remove_first_and_last_element($original_array);
print_r($new_array);

//4.Write a PHP function to check if a string contains only letters and whitespace.
function contains_only_letters_and_whitespace($str) {
  // Remove all characters except letters and whitespace
  $filtered_str = preg_replace("/[^a-zA-Z\s]/", "", $str);

  // Check if the filtered string is the same as the original string
  return $filtered_str === $str;
}

$string1 = "Hello world";
$string2 = "Hello 123";
$string3 = "Hello_world";
$string4 = "Hello-World";

var_dump(contains_only_letters_and_whitespace($string1)); // outputs bool(true)
var_dump(contains_only_letters_and_whitespace($string2)); // outputs bool(false)
var_dump(contains_only_letters_and_whitespace($string3)); // outputs bool(false)
var_dump(contains_only_letters_and_whitespace($string4)); // outputs bool(false)


//5.Write a PHP function to find the second largest number in an array of numbers.
function find_second_largest($arr) {
  // Initialize variables to keep track of the largest and second-largest numbers
  $largest = $arr[0];
  $second_largest = $arr[0];

  // Iterate over the array to find the largest and second-largest numbers
  foreach ($arr as $num) {
      if ($num > $largest) {
          $second_largest = $largest;
          $largest = $num;
      } elseif ($num > $second_largest && $num != $largest) {
          $second_largest = $num;
      }
  }

  // Return the second-largest number
  return $second_largest;
}

$array = array(1, 2, 3, 4, 5);
$second_largest = find_second_largest($array);
echo "The second largest number in the array is: " . $second_largest; // Outputs: The second largest number in the array is: 4
