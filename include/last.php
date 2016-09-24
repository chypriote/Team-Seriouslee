<?php	$bdd = mysqli_connect('localhost', 'seriouslee-data', 'azerty1234'); 
		mysqli_select_db($bdd, 'seriouslee'); ?>
<section id="last_results">
	<h3>Derniers résultats</h3>
	<table>
		<thead style="border-bottom:1px solid white;">
			<th>Type</th><th>Adversaire</th><th>Résultat</th><th>Médias</th>
		</thead>
<?php $reponse = mysqli_query($bdd, 'SELECT * FROM srs_videos ORDER BY date DESC, magic DESC, numero DESC LIMIT 0, 15');
	while ($data = mysqli_fetch_assoc($reponse)) {
		echo "<tr><td style=\"color:white\">" .$data['type']. " #" .$data['numero']. "</td>
		<td class=\"name\">";
			echo "<a href=\"watch.php?ID=".$data['ID']."\">" .$data['adversaire']."</a>";
			echo "</td>";
			if ($data['victory']) {
				echo "<td class=\"win\">WIN</td>";
			} else {
				echo "<td class=\"lose\">LOSE</td>";
			}
		echo "<td style=\"width: 10%\">";
			if ($data['link'] != "") {echo "<img src=\"images/video.png\" title=\"Video disponible\" />"; }
			if ($data['replay'] != "") {echo "<img src=\"images/replay.png\" title=\"Replay disponible\" />"; }
		echo	"</td></tr>";
	}
?>
	</table>
	<div class="clear"></div>
</section>
