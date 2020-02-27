<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SALUTE | Cetak Laporan</title>
</head>
<style>
    p{
        font-family: "Times New Roman", Times, serif;
        font-size: 10px;
    }
</style>
<body onload="window.print()">


    <table align="center" cellspacing="5" width="100%">
	
		    <tr>
			
                <td colspan="3"><h4>UNIT KOMPETENSI</h4></td>
            </tr>
            <tr>
                <td colspan="3"><center><h4>HASIL ANALISIS ANGKET <br> PELATIHAN BERBASIS KOMPETENSI <br> PER PROGRAM : <?=strtoupper($program1['nama_program']);?></h4></center></td>
            </tr>
			
			      <tr>
					<td colspan="3">
                        <!-- tabel -->  
                        <table border="1" width="100%">
                        <tr>
                            <th rowspan="2" width="15" class="text-center">No Responden</th>
                            <th colspan="<?= $jml_kuisioner_b_unit_kompetensi; ?>" class="text-center">Unit Kompetensi</th>
                          
                        </tr>
  
                          <tr>
                                <?php 
                                 $soal=1;
                                foreach ($kuisioner_b_unit_kompetensi as $key) { ?>
                                  <th class="text-center"><?= $soal++;?></th>
                                <?php }?>
                          </tr>        
                        <tbody>
                        <?php $i1=1;  foreach($pelatihan as $pl){ ?>
                          <?php 
                              $kd_pelatihan = $pl['kd_pelatihan'];
                              $responden = $this->db->query("SELECT DISTINCT id_user FROM penilaian_b WHERE kd_pelatihan='$kd_pelatihan'")->result_array(); 
                          ?>
  
                        <?php foreach($responden as $r){ ?>
                            <?php 
                              $id_user = $r['id_user'];
                              $soal = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=5 AND tipe_soal='pg'")->result_array(); 
                            ?>
                            <tr>
                            <td align="center"><?= $i1++; ?></td>
                            <!-- loop 2 -->
                            <?php $i2=1; 
                            foreach($soal as $s){
                              
                              $id_soal = $s['id_soalB']; 
                              $nilainya = $this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND id_soalB='$id_soal' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=5 AND tipe_soal='pg'")->row_array();  
                              // 
                            ?>
                            <td align="center"><?= $nilainya['jawaban']; ?></td>
                            <?php } ?>
                            <!-- akhir loop 2 -->
                            </tr>
                          <?php } ?>
                          <?php } ?>
                          <tr>
                            <td align="center">Jumlah</td>
                            <?php foreach($kuisioner_b_unit_kompetensi as $sl){ 
                                $id_soalnya = $sl['id_kuisionerB'];
                                $total = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                                              WHERE penilaian_b.id_soalB='$id_soalnya' AND pelatihan.id_program='$program'")->row_array();
                            ?>
                              <td align="center"><?= $total['total']; ?></td>
                            <?php } ?>
                          </tr>
                        
                        </tbody>
						</table>
					</td>	
				</tr>
	
	</table>



</body>
</html>