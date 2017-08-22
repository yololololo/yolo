<head>
<link href="../static/css/page
.css" type="text/css" rel="stylesheet" />
</head>
<body>
 <table width="100%">
                <tbody><tr style="font-weight: bold;">
               <?php
	                include('page.class.php');
	                $p=new page('comment');
					$th=$p->a();
					for($i=0;$i<count($th);$i++){
					  echo "<th>$th[$i]</th>";
					}


					
                    echo "</tr>";
                
					$tbody=$p->b();
					for($i=0;$i<count($tbody);$i++){
					  echo "<tr>";
					  for($j=0;$j<count($tbody[$i]);$j++){
					    echo "<td>{$tbody[$i][$j]}</td>";
					  }
					  echo "</tr>";
					}

					?>

                    <tr >
                        <td style="padding:20px;" colspan="20" style="text-align: center;">
                            <?php echo $p->c();?>
                        </td>
                    </tr>
                </tbody>
            </table>
            </body>