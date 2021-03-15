CREATE VIEW `mordibilitas` AS SELECT
    PERIKSA.tanggal,
	DIAGNOSA.icd,
    DIAGNOSA.diagnosa,
    POLI.id_poli,
    POLI.nama_poli,
	PERIKSA.id_pasien,
    PASIEN.nama_pasien,
    PASIEN.jenis_kelamin,
    TIMESTAMPDIFF(DAY,PASIEN.tgl_lahir,NOW()) AS umur_hari,
    CASE
        WHEN TIMESTAMPDIFF(DAY,PASIEN.tgl_lahir,NOW()) < 7 THEN '1-6 hari'
        WHEN TIMESTAMPDIFF(DAY,PASIEN.tgl_lahir,NOW())>6 AND TIMESTAMPDIFF(DAY,PASIEN.tgl_lahir,NOW())<29 THEN '7-28 hari'
        WHEN TIMESTAMPDIFF(DAY,PASIEN.tgl_lahir,NOW())>28 AND TIMESTAMPDIFF(DAY,PASIEN.tgl_lahir,NOW())<365 THEN '28 hari -1 tahun'
        WHEN TIMESTAMPDIFF(DAY,PASIEN.tgl_lahir,NOW())>364 AND TIMESTAMPDIFF(DAY,PASIEN.tgl_lahir,NOW())<1825 THEN '1-4 tahun'
        WHEN TIMESTAMPDIFF(DAY,PASIEN.tgl_lahir,NOW())>1824 AND TIMESTAMPDIFF(DAY,PASIEN.tgl_lahir,NOW())<5475 THEN '5-14 tahun'
        WHEN TIMESTAMPDIFF(DAY,PASIEN.tgl_lahir,NOW())>5474 AND TIMESTAMPDIFF(DAY,PASIEN.tgl_lahir,NOW())<9125 THEN '15-24 tahun'
        WHEN TIMESTAMPDIFF(DAY,PASIEN.tgl_lahir,NOW())>9124 AND TIMESTAMPDIFF(DAY,PASIEN.tgl_lahir,NOW())<16425 THEN '25-44 tahun'
        WHEN TIMESTAMPDIFF(DAY,PASIEN.tgl_lahir,NOW())>16424 AND TIMESTAMPDIFF(DAY,PASIEN.tgl_lahir,NOW())<23725 THEN '45-64 tahun'
        WHEN TIMESTAMPDIFF(DAY,PASIEN.tgl_lahir,NOW())>23724 THEN 'diatas 65 tahun'
    END AS klasifikasi
    FROM tb_periksa AS PERIKSA
    INNER JOIN tb_pasien AS PASIEN ON PERIKSA.id_pasien=PASIEN.id_pasien
    INNER JOIN tb_poliklinik AS POLI ON PERIKSA.id_poli=POLI.id_poli
    INNER JOIN tb_diagnosa AS DIAGNOSA ON PERIKSA.id_diagnosa=DIAGNOSA.id_diagnosa;
