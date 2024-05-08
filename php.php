<?php
isset($_POST['submit']);
$demand=[0];
$demand[0]=$_POST['d1'];
$demand[]=$_POST['d2'];
$demand[]=$_POST['d3'];
$demand[]=$_POST['d4'];
$demand[]=$_POST['d5'];
$demand[]=$_POST['d6'];
$demand[]=$_POST['d7'];
$demand[]=$_POST['d8'];
$demand[]=$_POST['d9'];
$demand[]=$_POST['d10'];
$fr=[0];
$fr[0]=$_POST['f1'];
$fr[]=$_POST['f2'];
$fr[]=$_POST['f3'];
$fr[]=$_POST['f4'];
$fr[]=$_POST['f5'];
$fr[]=$_POST['f6'];
$fr[]=$_POST['f7'];
$fr[]=$_POST['f8'];
$fr[]=$_POST['f9'];
$fr[]=$_POST['f10'];
$sum=0;
for ($j=0; $j <count($fr) ; $j++) {
  @$sum = $fr[$j]+$sum;
}
$p=[0.0];
$cp=[0];
for ($i=0; $i <count($fr) ; $i++) {
  @$p[$i] = $fr[$i]/$sum;
}
$cp[0]=$p[0];
for ($i=1; $i <count($p) ; $i++) {
  $cp[$i]=$p[$i]+$cp[$i-1];
}
$random=[0];
$random[0]=$_POST['r1'];
$random[]=$_POST['r2'];
$random[]=$_POST['r3'];
$random[]=$_POST['r4'];
$random[]=$_POST['r5'];
$random[]=$_POST['r6'];
$random[]=$_POST['r7'];
$random[]=$_POST['r8'];
$random[]=$_POST['r9'];
$random[]=$_POST['r10'];
$random[]=$_POST['r11'];
$random[]=$_POST['r12'];
$random[]=$_POST['r13'];
$random[]=$_POST['r14'];
$random[]=$_POST['r15'];
$random[]=$_POST['r16'];
$random[]=$_POST['r17'];
$random[]=$_POST['r18'];
$random[]=$_POST['r19'];
$random[]=$_POST['r20'];
$result=[];
for ($i=0; $i<Count($random) ; $i++) {
  if ($random[$i]<100) {
  	if ($random[$i]>0 && $random[$i]<=$cp[0]) {
  		$result[]=$demand[0];
  	}elseif ($random[$i]>=($cp[0]*100) && $random[$i]<=($cp[1]*100)) {
  		$result[]=$demand[1];
  	}elseif ($random[$i]>=($cp[1]*100) && $random[$i]<=($cp[2]*100)) {
  		$result[]=$demand[2];
  	}elseif ($random[$i]>=($cp[2]*100) && $random[$i]<=($cp[3]*100)) {
  		$result[]=$demand[3];
  	}elseif ($random[$i]>=($cp[3]*100) && $random[$i]<=($cp[4]*100)) {
  		$result[]=$demand[4];
  	}elseif ($random[$i]>=($cp[4]*100) && $random[$i]<=($cp[5]*100)) {
  		$result[]=$demand[5];
  	}elseif ($random[$i]>=($cp[5]*100)&& $random[$i]<=($cp[6]*100)) {
  		$result[]=$demand[6];
  	}elseif ($random[$i]>=($cp[6]*100) && $random[$i]<=($cp[7]*100)) {
  		$result[]=$demand[7];
  	}elseif ($random[$i]>=($cp[7]*100) && $random[$i]<=($cp[8]*100)) {
  		$result[]=$demand[8];
  	}else {
  		$result[]=$demand[9];
  	}
  }else {echo "error you enterd a numaric random variable please enter a number between 1 to 100";}
}
for ($i=0; $i <count($result) ; $i++) {
  @$smsum +=$result[$i];
}
@$avg= $smsum/count($demand);
$edd=0;
for ($i=0; $i <count($demand) ; $i++) {
@$edd+=$demand[$i]*$p[$i];
}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
    <link rel="stylesheet" type="text/css" href="php.css">
     <meta charset="utf-8">
     <title>Result</title>
   </head>
   <body>
     <table>
       <tr>
        <th>Daily Demand </th>
     		<th>Frequancy</th>
        <th>Probability of occurance</th>
        <th>Comulative probability</th>
        <th>Random numbers</th>
     		<th>simulated daily demand</th>
        <?php $j=1;
           $s=0;  ?>
        <?php for ($i=0; $i < count($demand) ; $i++) {
          ?>
        </tr>
        <tr>
          <th><?php echo $demand[$i]; ?></th>
          <th><?php echo $fr[$i]; ?></th>
          <th><?php if ($p[$i]!=0) {
           echo $p[$i];
          } ?></th>
          <th><?php
          if ($s!=1) {
            echo $cp[$i];
                 }

           if ($cp[$i]==1) {
          $s=1;
          }  ?></th>
          <th><?php echo $random[$i]; ?></th>
          <th><?php echo $result[$i]; ?></th>
        </tr>
      <?php $j++;
   } ?>
     </table>
<div class="textt">


     <h1>  <?php echo "The Sum Of Simulated Daily Demand=$smsum";?></h1>
 <h1><?php            echo "The Avarage Of Simulated Daily Demand=$avg";?></h1>
 <h1><?php            echo "Expected Daily Demand =$edd";
      ?></h1>
      </div>
   </body>
 </html>
