<?php

class Model_laporanperdin extends CI_Model
{
    public function getAllLaporanPerdin()
    {
        $this->db->select('*');
        $this->db->from('tb_laporan_perdin');
        $this->db->join('input_perdin', 'input_perdin.id_perdin = tb_laporan_perdin.id_perdin');
        $this->db->join('ms_klasifikasi_jabatan', 'ms_klasifikasi_jabatan.kode_kj = input_perdin.klasifikasi_jabtan');
        $this->db->join('ms_dana', 'ms_dana.id_dana = tb_laporan_perdin.id_dana');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getLaporanPerdinById($id)
    {
        return $this->db->get_where('tb_laporan_perdin', ['id_laporan_perdin' => $id])->row_array();
    }

    public function tambahDataLaporanPerdin($data)
    {
        $this->db->insert('tb_laporan_perdin', $data);
    }

    public function ubahDataLaporanPerdin($data, $id)
    {
        $this->db->where('id_laporan_perdin', $id);
        $this->db->update('tb_laporan_perdin', $data);
    }

    public function hapusDataLaporanPerdin($id)
    {
        $this->db->where('id_laporan_perdin', $id);
        $this->db->delete('tb_laporan_perdin');
    }
}
