<?
session_start();
$id_usuario=$_SESSION['user_id'];
$fecha=$_REQUEST['fecha'];
$id_pista=$_REQUEST['id_pista'];

require("lib/CreaConexion.php");
// Consultamos la BD

$conexion->connect('openrarp') or die('Error al conectar con la BD');
$query="SELECT consulta_reservas_fecha('$fecha',$id_pista) AS turno";
//echo $query;
$id_result=@$conexion->query($query);
$num_filas=@$conexion->num_rows($id_result);
//echo "num_filas: $num_filas";
$i=0;
while ($i<$num_filas){
	$fila=@$conexion->fetch_array($id_result,$i);
	$cadena=substr($fila[0],1,-1);
	//echo "$cadena <br/>";
	list($reservadopor,$hora_turno,$turno)=explode(',',$cadena);
	//$ocupado=json_encode($ocupado);
	if($reservadopor=='0'){
		$icon="images/i-icon-2.png";
		$rightText="RESERVAR";
	}elseif($reservadopor==$id_usuario){
		$icon="images/i-icon-9.png";
		$rightText="CANCELAR";
	}else{
		$icon="images/i-icon-9.png";
		$rightText="INFO";
	}
	$reservas[]=array('label' => $hora_turno, 'icon' => $icon, 'rightText' => $rightText); 
	$i++;
}
	$reservas_json=json_encode($reservas);
$cabecera='{
	"items": ';
$pie='}';
$resultado=$cabecera.$reservas_json.$pie;
echo $resultado;
?>
