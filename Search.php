<?php 
// Search for strings 
function binarySearch($arr, $x) 
{ 
    $l = 0; 
    $r = count($arr); 
    while ($l <= $r)  
    { 
        $m = $l + (int)(($r - $l) / 2); 
  
        $res = ($x == $arr[$m]); 
  
        // Check if x is present at mid 
        if ($res == 0) 
            return $m - 1; 
  
        // If x greater, ignore left half 
        if ($res > 0) 
            $l = $m + 1; 
  
        // If x is smaller, ignore right half 
        else
            $r = $m - 1; 
    } 
  
    return -1; 
} 
  
// Driver Code 
$arr = array("first", "second",  
                "third", ""); 
$x = <?php echo $_GET["Search.php"]; ?>; 
$result = binarySearch($arr, $x); // PHP program to implement Binary
  
if ($result == -1) 
    print("Element not present"); 
else
    print("Element found"); 
  
// This code is contributed by mits 
?> 
  
