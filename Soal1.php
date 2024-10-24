<?php
$jml = $_GET['jml']; 
echo "<table border=1>\n";

$totalKeseluruhan = 0; 

for ($a = $jml; $a > 0; $a--) {
    $totalBaris = 0; 

   
    for ($b = $a; $b > 0; $b--) {
        $totalBaris += $b; 
    }

    echo "<tr><td colspan='" . $a . "'>TOTAL: $totalBaris</td></tr>\n";
    echo "<tr>\n";

    for ($b = $a; $b > 0; $b--) {
        echo "<td>$b</td>\n"; 
    }
    echo "</tr>\n";
    
    $totalKeseluruhan += $totalBaris;
}

echo "<tr><td colspan='$jml'>TOTAL KESELURUHAN: $totalKeseluruhan</td></tr>\n";
echo "</table>\n"; 
?>
