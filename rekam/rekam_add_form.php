<?php include_once('../_header.php'); ?>
<form id='pasien-baru' class='' action="form_act.php" method="post">
                    <div class="form-group">
                       <label for="rekam">No. Rekam Medis</label>
                       <input onkeyup="cekRekam($(this))" type="number" id="rekam" class="form-control" required autofocus> 
                       <input type="hidden" name='id_pasien' id='id_pasien'>
                    </div>
                    <div class="form-group">
                       <label for="rekam">Tanggal</label>
                       <input type="date" name="tanggal" class="form-control" required autofocus> 
                       
                    </div>
                    <div class="form-group">
                       <label for="rekam">Tindakan</label>
                       <textarea class='form-control' name='tindakan'></textarea>
                    </div>
                    <div class="form-group">
                       <label for="poli">Poliklinik</label>
                       <select name="id_poli" id="poli" class="form-control">
                           <option value="">- Pilih -</option>
                           <?php
                            $Sql_poli = mysqli_query($con, "SELECT * FROM tb_poliklinik") or die (mysqli_error($con));
                            while($data_poli = mysqli_fetch_array($Sql_poli)) {
                                echo '<option value="'.$data_poli['id_poli'].'">'.$data_poli['nama_poli'].'</option>';
                            }
                           ?>
                       </select> 
                    </div>
                    <div class="form-group">
                       <label for="dokter">Dokter</label>
                       <select name="id_dokter" id="dokter" class="form-control">
                           <option value="">- Pilih -</option>
                           <?php
                            $Sql_dokter = mysqli_query($con, "SELECT * FROM tb_dokter") or die (mysqli_error($con));
                            while($data_dokter = mysqli_fetch_array($Sql_dokter)) {
                                echo '<option value="'.$data_dokter['id_dokter'].'">'.$data_dokter['nama_dokter'].'</option>';
                            }
                           ?>
                       </select> 
                    </div>
                    <div class="form-group">
                       <label for="dokter">Diagnosa Dokter</label>
                       <select name="id_diagnosa" id="dokter" class="form-control">
                           <option value="">- Pilih -</option>
                           <?php
                            $Sql_dokter = mysqli_query($con, "SELECT * FROM tb_diagnosa") or die (mysqli_error($con));
                            while($data_dokter = mysqli_fetch_array($Sql_dokter)) {
                                echo '<option value="'.$data_dokter['id_diagnosa'].'">'.$data_dokter['diagnosa'].'</option>';
                            }
                           ?>
                       </select> 
                    </div>
                    <div class="form-group pull-right">
                        <input id='sub' type="submit" name="add" value="simpan" class="btn btn-success">
                        <input type="reset" name="reset" value="Reset" class="btn btn-primary">
                    </div>
                </form>

                <?php include_once('../_footer.php'); ?>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js'></script>
                <script>
                    $(document).ready(()=>{
                        $(window).keydown(function(event){
                            if(event.keyCode == 13) {
                            event.preventDefault();
                            return false;
                            }
                        });
                        window.cekRekam = async(obj)=>{
                            let text = obj.val();
                            let url = `<?=base_url('rekam/cek_rekam.php')?>?no=${text}`;
                            const {data} = await axios.get(url);
                            console.log(data);
                            if(data.error!=undefined){
                                $("#sub").hide();
                            }else{
                                $("#id_pasien").val(data.id_pasien);
                                $("#sub").show();

                            }
                        }
                    });
                </script>