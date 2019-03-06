<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_disporabud extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('masyarakat');
        // $this->load->model('pengguna_dinas');
        // $this->load->model('kasir');
        // $this->load->model('admin');
        $this->load->model('prasarana');
        $this->load->model('peminjaman');
        $this->load->model('pembayaran');
        $this->load->model('user_login');
        $this->load->model('masyarakat');
        $this->load->model('kasir');
        $this->load->model('pengguna_dinas');
    }

    public function index($tampilan = null)
    {
        $data['user'] = $this->user_login->getUser()->result();
        if ($this->session->akses == "admin") {
            $data['data'] = $this->user_login->getUser()->result();
            $this->load->view('backend/admin/v_home', $data);

        } else if ($this->session->akses == "masyarakat") {
            $username = $this->session->username;
            $data = $this->masyarakat->getWhereUsername($username)->result();
            $no_ktp = "";
            foreach ($data as $d) {
                $no_ktp = $d->no_ktp;
            }
            $getPeminjaman = $this->peminjaman->getJoin()->result();
            $events = array();
            foreach ($getPeminjaman as $item){
                $event = array(
                    'title' => $item->nama_acara . " - " . $item->nama_prasarana,
                    'start' => intval($item->tgl_pelaksanaan) * 1000,
                    'end' => intval($item->tgl_selesai) * 1000
                );
                array_push($events,$event);
            }
            $data['events'] = json_encode($events);
            $data['bayar_sebelum'] = $this->peminjaman->getBayarSebelum($no_ktp)->result();
            $data['data'] = $this->peminjaman->getJoin()->result();
            $data['bayar'] = $this->pembayaran->getWhereID($no_ktp)->result();
            $this->load->view('backend/masyarakat/v_home_masyarakat', $data);

        } else if ($this->session->akses == "staff") {
            $data['data'] = $this->prasarana->getPrasarana()->result();
            $this->load->view('backend/pengguna_dinas/v_staff_prasarana', $data);

        } else if ($this->session->akses == "kasir") {
            $this->session->set_userdata('status_pembayaran', 'belum');
            $data['notifikasi'] = $this->peminjaman->getBelumBayar()->result()[0]->jumlah;
            $data['data'] = $this->pembayaran->getJoinBelumBayar()->result();
            $this->load->view('backend/kasir/v_home_kasir', $data);

        } else if ($this->session->akses == "kabid" || $this->session->akses == "kadin" || $this->session->akses == "kasek") {
            $this->session->set_userdata('status_approval', 'belum');
            $data['data'] = $this->peminjaman->getBelumApprove()->result();
            $data['peminjaman'] = $this->peminjaman->getLaporan()->result();
            $this->load->view('backend/pengguna_dinas/v_home_ka', $data);

        } else {
            if ($tampilan == null || $tampilan == "beranda") {
                $this->load->view('frontend/v_home');
            } else if ($tampilan == "gambar") {
                $data['data'] = $this->prasarana->getPrasarana()->result();
                $this->load->view('frontend/v_gambar', $data);
            }
            // $this->load->view('frontend/v_gambar');
        }
    }

    // user ==================================================================================

    public function daftar()
    {
        $this->load->view('backend/v_register');
    }

    public function registrasi()
    {

        $no_ktp = $this->input->post('no_ktp');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $akses = 'masyarakat';
        $alamat = $this->input->post('alamat');

        $data_masyarakat = array(
            'no_ktp' => $no_ktp,
            'username' => $username,
            'nama_lengkap' => $nama_lengkap,
            'no_hp' => $no_hp,
            'email' => $email,
            'alamat' => $alamat,
        );

        $data = array(
            'username' => $username,
            'password' => $password,
            'akses' => $akses,
        );

        $this->user_login->tambahUser($data);
        $this->masyarakat->tambahUser($data_masyarakat);
        $this->session->set_flashdata('pesan', 'Pendaftaran Berhasil');
        $this->load->view('backend/v_login');
    }

    public function v_lupaPassword()
    {
        $this->load->view('backend/v_lupa_password');
    }

    public function lupaPassword()
    {
        $username = $this->input->post('username');
        $password = "R-" . rand(10000, 99999);

        $data = array(
            'username' => $username,
            'password' => $password,
        );

        $this->user_login->editUser($username, $data);

        $this->session->set_flashdata('pesan', 'Silahkan login dengan password ' . $password);
        $this->load->view('backend/v_login');
    }

    public function editProfilMasyarakat()
    {

        if (!isset($_POST['submit'])) {
            $username = $this->session->username;
            $data['data'] = $this->masyarakat->getWhereUsername($username)->result();
            $this->load->view('backend/masyarakat/v_edit_masyarakat', $data);
        } else {

            $no_ktp = $this->input->post('no_ktp');
            $username = $this->input->post('username');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $no_hp = $this->input->post('no_hp');
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');

            $data_masyarakat = array(
                'no_ktp' => $no_ktp,
                'nama_lengkap' => $nama_lengkap,
                'no_hp' => $no_hp,
                'email' => $email,
                'alamat' => $alamat,
            );

            $data_user = array(
                'username' => $username,
            );

            // untuk edit data di user_login
            $pk = $this->session->username;

            $this->user_login->editUser($pk, $data_user);
            $this->masyarakat->editUser($no_ktp, $data_masyarakat);

            $this->session->set_userdata('username', $username);

            // print_r($data);

            redirect('c_disporabud/index');

        }
    }

    public function editPasswordMasyarakat()
    {

        if (!isset($_POST['submit'])) {
            $username = $this->session->username;
            $data['data'] = $this->masyarakat->getWhereUsername($username)->result();
            $this->load->view('backend/masyarakat/v_edit_password', $data);
        } else {

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $data_user = array(
                'password' => $password,
            );

            $this->user_login->editUser($username, $data_user);

            redirect('c_disporabud/index');

        }
    }

    // login logout ====================================================================================

    public function v_login()
    {
        $this->load->view('backend/v_login');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $login_gagal = true;
        $login = $this->user_login->getUser()->result();

        foreach ($login as $l) {
            if ($l->username == $username && $l->password == $password) {
                $this->session->set_userdata('akses', $l->akses);
                $this->session->set_userdata('username', $l->username);
                redirect('c_disporabud/index');
                $login_gagal = false;
            }
        }

        if ($login_gagal) {
            $this->session->set_flashdata('pesan', 'Login Gagal');
            $this->load->view('backend/v_login');
        }

        // if ($akses == "masyarakat") {
        //     $login = $this->masyarakat->getMasyarakat()->result();
        //     foreach ($login as $l) {
        //         if ($l->username == $username && $l->password == $password) {
        //             $this->session->set_userdata('akses', 'masyarakat');
        //             $this->session->set_userdata('no_ktp', $l->no_ktp);
        //             redirect('c_disporabud/index');
        //             $login_gagal = false;
        //         }
        //     } if ($login_gagal) {
        //         $this->session->set_flashdata('pesan', 'Login Gagal');
        //         $data['akses'] = 'masyarakat';
        //         $this->load->view('backend/v_login', $data);
        //     }
        // } else if ($akses == "pengguna_dinas") {
        //     $login = $this->pengguna_dinas->getPenggunaDinas()->result();
        //     foreach ($login as $l) {
        //         if ($l->username == $username && $l->password == $password) {
        //             $this->session->set_userdata('akses', $l->tipe);
        //             $this->session->set_userdata('nip', $l->nip);
        //             redirect('c_disporabud/index');
        //         } else {
        //             $this->session->set_flashdata('pesan', 'Login Gagal');
        //             $data['akses'] = 'staff';
        //             $this->load->view('backend/v_login', $data);
        //         }
        //     }
        // }

        // else if ($akses == "pengguna_dinas") {

        // }

        // else if ($akses == "kasir") {
        # code...
        // } else if ($akses == "admin") {
        //     $login = $this->admin->getAdmin()->result();
        //     foreach ($login as $l) {
        //         if ($l->username == $username && $l->password == $password) {
        //             $this->session->set_userdata('akses', 'admin');
        //             redirect('c_disporabud/index');
        //         } else {
        //             $this->session->set_flashdata('pesan', 'Login Gagal');
        //             $data['akses'] = 'admin';
        //             $this->load->view('backend/v_login', $data);
        //         }
        //     }
        // }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('c_disporabud/index');
    }

    public function admin($jenis_user)
    {
        if ($jenis_user == "admin") {

            $data['admin'] = $this->admin->getAdmin()->result();
            $data['user'] = 'admin';
            $this->load->view('backend/admin/v_home', $data);

        } else if ($jenis_user == "masyarakat") {

            $data['masyarakat'] = $this->masyarakat->getMasyarakat()->result();
            $data['user'] = 'masyarakat';
            $this->load->view('backend/admin/v_home', $data);

        } else if ($jenis_user == "kasir") {

            $data['kasir'] = $this->kasir->getKasir()->result();
            $data['user'] = 'kasir';
            $this->load->view('backend/admin/v_home', $data);

        } else if ($jenis_user == "pengguna_dinas") {

            $data['pengguna_dinas'] = $this->pengguna_dinas->getPenggunaDinas()->result();
            $data['user'] = 'pengguna_dinas';
            $this->load->view('backend/admin/v_home', $data);
        }
    }

    public function hapusPengguna($pk)
    {
        $this->user_login->hapusUser($pk);
        redirect('c_disporabud/index');
    }

    // public function tambahPenggunaRusak(){

    //     $no_ktp = $this->input->post('no_ktp');
    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');
    //     $nama_lengkap = $this->input->post('nama_lengkap');
    //     $email = $this->input->post('email');
    //     $no_hp = $this->input->post('no_hp');
    //     $akses = 'masyarakat';
    //     $alamat = $this->input->post('alamat');

    //     $data_masyarakat = array(
    //         'no_ktp' => $no_ktp,
    //         'username' => $username,
    //         'nama_lengkap' => $nama_lengkap,
    //         'no_hp' => $no_hp,
    //         'email' => $email,
    //         'alamat' => $alamat
    //     );

    //     $data = array(
    //         'username' => $username,
    //         'password' => $password,
    //         'akses' => $akses
    //     );

    //     $this->user_login->tambahUser($data);
    //     $this->masyarakat->tambahUser($data_masyarakat);
    //     $this->session->set_flashdata('pesan', 'Pendaftaran Berhasil');
    //     $this->load->view('backend/v_login');
    // }

    public function tambahPengguna()
    {

        if (!isset($_POST['submit'])) {
            $this->load->view('backend/admin/v_tambah_pengguna');
        } else {

            $id = $this->input->post('id');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $no_hp = $this->input->post('no_hp');
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $akses = $this->input->post('akses');

            $data_user = array(
                'username' => $username,
                'password' => $password,
                'akses' => $akses,
            );

            $this->user_login->tambahUser($data_user);

            if ($akses != 'admin') {
                if ($akses == 'masyarakat') {
                    $id_pengguna = 'no_ktp';
                } elseif ($akses == 'kasir') {
                    $id_pengguna = 'id_kasir';
                } else {
                    $id_pengguna = 'nip';
                }

                $data_pengguna = array(
                    $id_pengguna => $id,
                    'username' => $username,
                    'nama_lengkap' => $nama_lengkap,
                    'no_hp' => $no_hp,
                    'email' => $email,
                    'alamat' => $alamat,
                );

                if ($akses == 'masyarakat') {
                    $this->masyarakat->tambahUser($data_pengguna);
                } elseif ($akses == 'kasir') {
                    $this->kasir->tambahUser($data_pengguna);
                } else {
                    $this->pengguna_dinas->tambahUser($data_pengguna);
                }

            }

            redirect('c_disporabud/index');

        }
    }

    public function editPengguna()
    {

        if (!isset($_POST['submit'])) {
            $username = $_GET['pk'];
            $akses = $_GET['akses'];
            if ($akses == 'masyarakat') {
                $data['data'] = $this->masyarakat->getWhereUsername($username)->result();
            } elseif ($akses == 'kasir') {
                $data['data'] = $this->kasir->getWhereUsername($username)->result();
            } else {
                $data['data'] = $this->pengguna_dinas->getWhereUsername($username)->result();
            }

            // $data['data'] = $this->user_login->getWhereUsername($username, $akses)->result();
            $this->load->view('backend/admin/v_edit_pengguna', $data);
        } else {

            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $no_hp = $this->input->post('no_hp');
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $akses = $this->input->post('akses');

            $data = array(
                'username' => $username,
                'password' => $password,
                'akses' => $akses,
            );

            $data_pengguna = array(
                'username' => $username,
                'nama_lengkap' => $nama_lengkap,
                'no_hp' => $no_hp,
                'email' => $email,
                'alamat' => $alamat,
            );

            if ($akses == 'masyarakat') {
                $this->masyarakat->editUserAdmin($username, $data_pengguna);
            } elseif ($akses == 'kasir') {
                $this->kasir->editUserAdmin($username, $data_pengguna);
            } else {
                $this->pengguna_dinas->editUserAdmin($username, $data_pengguna);
            }

            $this->user_login->editUser($username, $data);
            redirect('c_disporabud/index');

        }
    }

    public function staff($tampilan)
    {
        $data['user'] = "staff";
        if ($tampilan == "penyewaan") {
            $data['prasarana'] = $this->prasarana->getPrasarana()->result();
            $this->load->view('backend/pengguna_dinas/v_staff_prasarana', $data);
        } else if ($tampilan == "prasarana") {
            $data['prasarana'] = $this->prasarana->getPrasarana()->result();
            $this->load->view('backend/pengguna_dinas/v_staff_prasarana', $data);
        }
    }

    public function tambahPrasarana()
    {
        if (!isset($_POST['submit'])) {
            $this->load->view('backend/pengguna_dinas/v_staff_tambah_prasarana');
        } else {
            $id_prasarana = "P" . rand(100, 999);
            $tarif = $this->input->post('tarif');
            $nama_prasarana = $this->input->post('nama_prasarana');
            $gambar = '';

            $config['upload_path'] = 'assets/img/prasarana/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 5024 * 2;
            $config['file_name'] = time() . $_FILES['gambar']['name'];

            $this->load->library('Upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data();
            }

            $data_gambar = $config['upload_path'] . $config['file_name'];

            $data = array(
                'id_prasarana' => $id_prasarana,
                'nama_prasarana' => $nama_prasarana,
                'gambar' => $data_gambar,
                'tarif' => $tarif,
            );
            $this->prasarana->tambahPrasarana($data);
            redirect('c_disporabud/index');
        }
    }

    public function editPrasarana($id_prasarana = null)
    {
        if (!isset($_POST['submit'])) {
            $pk = $_GET['pk'];
            $data['data'] = $this->prasarana->getWhere($pk)->result();
            $this->load->view('backend/pengguna_dinas/v_staff_edit_prasarana', $data);
        } else {

            $tarif = $this->input->post('tarif');
            $nama_prasarana = $this->input->post('nama_prasarana');
            $gambar = '';

            $config['upload_path'] = 'assets/img/prasarana/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 5024 * 2;
            $config['file_name'] = time() . $_FILES['gambar']['name'];

            $this->load->library('Upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data();
            }

            $data_gambar = $config['upload_path'] . $config['file_name'];

            $data = array(
                'nama_prasarana' => $nama_prasarana,
                'gambar' => $data_gambar,
                'tarif' => $tarif,
            );
            $this->prasarana->editPrasarana($id_prasarana, $data);
            redirect('c_disporabud/index');
        }
    }

    public function hapusPrasarana($id_prasarana)
    {
        $this->prasarana->hapusPrasarana($id_prasarana);
        redirect('c_disporabud/index');
    }

    public function masyarakat($tampilan)
    {
        if ($tampilan == "jadwal") {
            # code...
        } else if ($tampilan == "penyewaan") {
            if (!isset($_POST['submit'])) {
                $this->load->view('backend/masyarakat/v_masyarakat_penyewaan');
            }
        }
    }

    public function gambarPeminjaman()
    {
        $data['fasilitas'] = $this->prasarana->getPrasarana()->result();
        $this->load->view('backend/masyarakat/v_gambar_peminjaman', $data);
    }

    public function tambahPeminjaman()
    {
        if (!isset($_POST['submit'])) {
            $id = $_GET['id'];
            $id_peminjaman = rand(1000, 9999);
            $username = $this->session->username;
            $no_ktp = "";
            $jadwal = $this->peminjaman->getKetersediaan($id);
            $data = $this->masyarakat->getWhereUsername($username)->result();
            foreach ($data as $d) {
                $no_ktp = $d->no_ktp;
            }
            $this->session->set_userdata('no_ktp', $no_ktp);
            $this->session->set_userdata('id_peminjaman', $id_peminjaman);
            // $data = array (
            //     'no_ktp' => $no_ktp,
            //     'username' => $username,
            //     'id_peminjaman' => rand(1000, 9999)
            // );
            // $data['username'] = $username;
            // $data['id_peminjaman'] = rand(1000, 9999);
            $data['fasilitas'] = $this->prasarana->getWhere($id)->result();
            $data['jadwal_terpakai'] = json_encode($jadwal);
            $this->load->view('backend/masyarakat/v_peminjaman', $data);
        } else {

            $nama_acara = $this->input->post('nama_acara');
            $tgl_pelaksanaan = new DateTime($this->input->post('tgl_pelaksanaan'));
            $tgl_selesai = new DateTime($this->input->post('tgl_selesai'));
            $note = $this->input->post('note');

            $jumlah_hari = $tgl_pelaksanaan->diff($tgl_selesai);
            // echo $jumlah_hari->days;

            $tgl_pelaksanaan = strtotime($this->input->post('tgl_pelaksanaan'));
            $tgl_selesai = strtotime($this->input->post('tgl_selesai'));

            // ambil no_ktp
            $username = $this->session->username;
            $data = $this->masyarakat->getWhereUsername($username)->result();
            $no_ktp = "";
            foreach ($data as $d) {
                $no_ktp = $d->no_ktp;
            }
            $id_peminjaman = $this->session->id_peminjaman;
            $id_prasarana = $this->input->post('fasilitas');
            $data = $this->prasarana->getWhere($id_prasarana)->result();
            $total_harga = "";
            foreach ($data as $d) {
                $total_harga = $jumlah_hari->days * $d->tarif + rand(100, 999);
            }

            $data_peminjaman = array(
                'id_peminjaman' => $id_peminjaman,
                'nama_acara' => $nama_acara,
                'tgl_pelaksanaan' => $tgl_pelaksanaan,
                'tgl_selesai' => $tgl_selesai,
                'note' => $note,
                'total_harga' => $total_harga,
                'no_ktp' => $no_ktp,
                'id_prasarana' => $id_prasarana,
            );

            $id_transaksi = rand(1000, 9999);
            $approval_pengajuan = "Belum diapprove";
            $status_pembayaran = "Belum dibayar";
            $bukti_pembayaran = "-";

            $data_pembayaran = array(
                'id_transaksi' => $id_transaksi,
                'approval_pengajuan' => $approval_pengajuan,
                'status_pembayaran' => $status_pembayaran,
                'bukti_pembayaran' => $bukti_pembayaran,
                'id_peminjaman' => $id_peminjaman,
                'id_kasir' => '-',
            );

            $this->peminjaman->tambahPeminjaman($data_peminjaman);
            $this->pembayaran->tambahPembayaran($data_pembayaran);
            redirect('c_disporabud/index');

            // $time_stamp = strtotime($tgl_pelaksanaan);
            // $tgl_lagi = date('Y/m/d', $time_stamp);
        }
    }

    public function historyPenyewaan()
    {
        // ambil data no_ktp
        $no_ktp = $this->session->no_ktp;
        $data['data'] = $this->peminjaman->getHistory($no_ktp)->result();
        $this->load->view('backend/masyarakat/v_history_penyewaan', $data);
    }

    public function v_buktiPembayaran()
    {
        $username = $this->session->username;
        $data = $this->masyarakat->getWhereUsername($username)->result();
        $no_ktp = "";
        foreach ($data as $d) {
            $no_ktp = $d->no_ktp;
        }
        $data_pembayaran['data'] = $this->pembayaran->getWhereID($no_ktp)->result();
        $this->load->view('backend/masyarakat/v_pembayaran', $data_pembayaran);
    }

    public function buktiPembayaran()
    {
        if (!isset($_POST['submit'])) {
            // ambil no_ktp
            $username = $this->session->username;
            $data = $this->masyarakat->getWhereUsername($username)->result();
            $no_ktp = "";
            foreach ($data as $d) {
                $no_ktp = $d->no_ktp;
            }
            $id_transaksi = $_GET['bayar'];
            $data['data'] = $this->pembayaran->getWhereIDPembayaran($no_ktp, $id_transaksi)->result();
            $this->load->view('backend/masyarakat/v_upload_pembayaran', $data);
        } else {

            $id_transaksi = $_GET['bayar'];

            $config['upload_path'] = 'assets/img/bukti_bayar/';
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size'] = 1024 * 2;
            $config['file_name'] = time() . $_FILES['bukti_pembayaran']['name'];
            $this->load->library('Upload', $config);
            if ($this->upload->do_upload('bukti_pembayaran')) {
                $bukti_pembayaran = $this->upload->data();
            }

            $data_gambar = $config['upload_path'] . $config['file_name'];

            $data = array(
                'bukti_pembayaran' => $data_gambar,
                'status_pembayaran' => "Sudah dibayar",
            );

            $this->pembayaran->editPembayaran($id_transaksi, $data);
            redirect('c_disporabud/index');
        }
    }

    public function approveKasir()
    {
        $id_transaksi = $_GET['id'];
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_pembayaran' => 'Sudah dibayar',
        );
        $this->pembayaran->editPembayaran($id_transaksi, $data);
        if ($this->session->akses == "staff") {
            redirect('c_disporabud/pengajuan');
        } else {
            redirect('c_disporabud/index');
        }

    }

    public function tolakKasir()
    {
        $id_transaksi = $_GET['id'];
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_pembayaran' => 'Ditolak',
        );
        $this->pembayaran->editPembayaran($id_transaksi, $data);
        redirect('c_disporabud/index');
    }

    public function sudahApproveKasir()
    {
        $this->session->set_userdata('status_pembayaran', 'sudah');
        $data['data'] = $this->pembayaran->historyPembayaran()->result();
        $this->load->view('backend/kasir/v_home_kasir', $data);
    }

    public function approveKA()
    {
        $id_transaksi = $_GET['id'];
        $data = array(
            'id_transaksi' => $id_transaksi,
            'approval_pengajuan' => 'Sudah diapprove',
        );
        $this->pembayaran->editPembayaran($id_transaksi, $data);
        redirect('c_disporabud/index');
    }

    public function sudahApproveKA()
    {
        $this->session->set_userdata('status_approval', 'sudah');
        $data['data'] = $this->peminjaman->getSudahApprove()->result();
        $this->load->view('backend/pengguna_dinas/v_home_ka_approve', $data);
    }

    public function laporan()
    {
        $data['data'] = $this->peminjaman->getSudahApprove()->result();
        $this->load->view('backend/pengguna_dinas/v_ka_laporan', $data);
    }

    public function tes()
    {
        // $this->load->view('backend/admin/tes');
        // $this->load->view('backend/admin/fd51');
        // $this->load->view('backend/admin/v_home');
        $this->load->view('backend/pengguna_dinas/v_staff_tambah_prasarana');
    }
    public function pengajuan()
    {
        
        $data['notifikasi_bayar'] = $this->peminjaman->getBelumBayar()->result()[0]->jumlah;
        $data['notifikasi_acc'] = $this->peminjaman->getBelumAcc()->result()[0]->jumlah;
        $data['data'] = $this->peminjaman->getJoin()->result();
        $this->load->view('backend/pengguna_dinas/v_staff_kelola_pengajuan', $data);
    }
    public function accPengajuan($pk)
    {
        $data = array(
            'approval_pengajuan' => 'Sudah diapprove',
        );
        $this->pembayaran->editPembayaran($pk, $data);
        redirect("c_disporabud/pengajuan");
    }
}
