<?php
require_once './bbdd/empleados.php';
$empleados = new Empleados();
$usuarios = array (
"DSR",
"AFD",
"EAP",
"CAA",
"EAG",
"ABP",
"JBM",
"JBS",
"PBA",
"CBN",
"PBQ",
"DBM",
"JCM",
"PCP",
"SCC",
"JCS",
"MAC",
"CCC",
"RCS",
"VCI",
"JCR",
"JMC",
"JCC",
"ECL",
"SML",
"XCC",
"CCA",
"FJC",
"PCM",
"GCR",
"CTO",
"JLD",
"ADM",
"RDM",
"FDP",
"LRE",
"VEB",
"HIL",
"AEA",
"JFS",
"FFC",
"AFP",
"GGR",
"NGC",
"CGS",
"PGY",
"AGC",
"AGF",
"IGS",
"MGB",
"RGL",
"SGR",
"JGM",
"NGR",
"NGS",
"JGB",
"SMG",
"CGO",
"JCH",
"RHM",
"SHF",
"MBC",
"JIC",
"GPJ",
"FJG",
"RLR",
"ALF",
"TLE",
"JLL",
"RLP",
"LML",
"MIL",
"MLS",
"RMB",
"JMS",
"JMM",
"AMM",
"SMB",
"MMP",
"JMP",
"SMH",
"GMP",
"GMC",
"FMA",
"OMM",
"RMA",
"JMG",
"DMM",
"FMJ",
"VNB",
"JND",
"ADN",
"BNC",
"LNV",
"LOD",
"OPM",
"EPG",
"VPA",
"ERC",
"ARD",
"JRG",
"PRF",
"LJQ",
"JLR",
"ARB",
"JRL",
"RLA",
"PSR",
"ESQ",
"JMH",
"JSR",
"VSL",
"JSB",
"AST",
"JSF",
"BSG",
"CSF",
"JSD",
"JSS",
"FTC",
"JTZ",
"CTT",
"SUQ",
"MVL",
"IVL",
"MVV",
"FVR",
"VVM",
"MPZ",
"prueba",
"acosinga",
"MAV",
"TBG",
"JAE",
"VPA",
"prueba"
);
$salt='$tsi$/';
foreach ($usuarios as $usuario) {
  $contra = sha1(md5($salt . $usuario));
  echo $usuario ."    -->   " .$contra;
  echo "<br><br>";
  /*$contra = sha1(md5($salt . $usuario));
  $nuevaContra = $empleados -> guardarrContra($contra, $usuario);
  if ($nuevaContra == false) {
    echo "MERDA: " .$usuario;
    echo "<br><br>";
  }else {
    echo $usuario ."    -->   " .$contra;
    echo "<br><br>";
  }*/

}

 ?>
