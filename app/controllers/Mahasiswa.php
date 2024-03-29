<?php
class Mahasiswa extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setflash('berhasil', 'ditambahkan', 'success');
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setflash('gagal', 'ditambahkan', 'danger');
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        }
    }
    public function hapus($id)
    {
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
            Flasher::setflash('berhasil', 'dihapus', 'danger');
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setflash('gagal', 'ditambahkan', 'danger');
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function getupdate()
    {
        echo json_encode($this->model('Mahasiswa_Model')->getMahasiswaById($_POST['id']));
    }

    public function update()
    {
        if ($this->model('Mahasiswa_model')->updateDataMahasiswa($_POST) > 0) {
            Flasher::setflash('berhasil', 'diubah', 'success');
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setflash('gagal', 'diubah', 'danger');
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
}
