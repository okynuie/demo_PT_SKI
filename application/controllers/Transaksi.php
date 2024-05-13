<?php

class Transaksi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('menu_model');
    $this->load->model('submenu_model');
    $this->load->model('supplier_model');
    $this->load->model('hbeli_model');
    $this->load->model('dbeli_model');
    $this->load->model('hutang_model');
    $this->load->model('barang_model');
    $this->load->model('stock_model');
  }

  public function detailBeli()
  {
    $data['title'] = 'Pembelian';
    $menu = $this->menu_model;
    $submenu = $this->submenu_model;
    $supplier =  $this->supplier_model;

    $data['menu'] = $menu->getAllMenu();
    $data['submenu'] = $submenu->getAll();
    $data['supplier'] = $supplier->getAll();
    $data['notransaksi'] = $this->noTransaksi();

    $this->load->view('component/Header', $data);
    $this->load->view('component/Navbar', $data);
    $this->load->view('component/Topbar', $data);
    $this->load->view('Detail_transaksi', $data);
    $this->load->view('component/Copyright', $data);
    $this->load->view('component/Footer');
  }

  public function index()
  {
    $data['title'] = 'Pembelian';
    $menu = $this->menu_model;
    $submenu = $this->submenu_model;
    $hutang = $this->hutang_model;
    $db_supplier = $this->supplier_model;

    $data['menu'] = $menu->getAllMenu();
    $data['submenu'] = $submenu->getAll();
    $data['hutang'] = $hutang->getAll();
    $data['supplier'] = $db_supplier->getAll();

    $this->load->view('component/Header', $data);
    $this->load->view('component/Navbar', $data);
    $this->load->view('component/Topbar', $data);
    $this->load->view('Hutang_v', $data);
    $this->load->view('component/Copyright', $data);
    $this->load->view('component/Footer');
  }

  public function noTransaksi()
  {
    $hutang = $this->hutang_model;
    $noTransaksiAkhir = $hutang->getAll();
    $tahun= date("Y");
    $bulan= date("m");

    if(!Empty($noTransaksiAkhir))
    {
      $getno = substr($noTransaksiAkhir[0]['notransaksi'], 7);
      $no = $getno + 1;
      $noTransaksi = str_pad ( $no, 3, "0", STR_PAD_LEFT);
    }else{
      $no = 1;
      $noTransaksi = str_pad ( $no, 3, "0", STR_PAD_LEFT);
    }

    $formatednoTransaksi= "B".$tahun.$bulan.$noTransaksi;
    return $formatednoTransaksi;
  }

  public function simpanInput()
  {
    $data['title'] = 'Pembelian';
    // $menu = $this->menu_model;
    // $submenu = $this->submenu_model;
    // $supplier =  $this->supplier_model;

    // $data['menu'] = $menu->getAllMenu();
    // $data['submenu'] = $submenu->getAll();
    // $data['supplier'] = $supplier->getAll();
    // $data['notransaksi'] = $this->noTransaksi();

    $db_hbeli = $this->hbeli_model;
    $db_dbeli = $this->dbeli_model;
    $db_hutang = $this->hutang_model;
    $db_barang = $this->barang_model;
    $db_stok = $this->stock_model;

    $post0= $this->input->post();
    // $this->form_validation->set_rules($db_hbeli->rules());
    // $this->form_validation->set_rules($db_dbeli->rules());
    // $this->form_validation->set_rules($db_barang->rules());
    // if($this->form_validation->run() == false)
    // {
    //   $this->load->view('component/Header', $data);
    //   $this->load->view('component/Navbar', $data);
    //   $this->load->view('component/Topbar', $data);
    //   $this->load->view('Detail_transaksi', $data);
    //   $this->load->view('component/Copyright', $data);
    //   $this->load->view('component/Footer');
    // }else{

      $data['notransaksi'] = $post0['notransaksi'];
      $data['kodespl'] = $post0['kodespl'];
      $data['tglbeli'] = $post0['tanggalbeli'];
  
      $data_post = $this->input->post('dbeli');
  
      $cek_notransaksi = $db_hbeli->getBy($data['notransaksi']);
  
      if(!empty($cek_notransaksi))
      {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Terjadi kesalahan dalam pembuatan no. transaksi!
        </div>');
        redirect("transaksi/detailBeli");
  
      }else{
        echo('no transaksi tidak ada');
        if($db_hbeli->saveHSpl($data))
        {
          $i = 0;
          foreach($data_post as $dp)
          {
            foreach($dp as $key=>$value)
            {
              // echo "Key: $key, Value: $value";
              $data[$key] = $value;
              $i++;
            }
      
            if($i == 8)
              {
                // var_dump($data);
                // filter kodebrg != input, if notransaksi = input
                $cek_transaksibeli = $db_dbeli->cekDbeli($data);
                if(empty($cek_transaksibeli))
                {
                  // data transaction
                  $cekbrg = $db_barang->getBy($data['kodebarang']);

                  echo("sebelum proses hutang");
                  echo("</br>");
                  var_dump($data);
                  echo("</br>");
                  if($db_dbeli->saveBeli($data))
                  {
                    // var_dump($db_hutang->saveHutang($data));
                    $cekbrg = $db_barang->getBy($data['kodebarang']);
                    
                    // if($db_hutang->saveHutang($data)){};

                      $db_hutang->saveHutang($data);
                      
                        var_dump($data);
                        // save barang
                        if(!empty($cekbrg)){
                          $db_barang->updateBrg($data, $cekbrg);
                        }else{
                          $db_barang->saveBrg($data);
                        }
                        
                        $db_stok->updateStok($data);

                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Data Pembelian berhasil tersimpan!
                        </div>');
                        redirect("transaksi/detailBeli");


                        // if ($this->db->trans_status() === FALSE)
                        // {
                        //         $this->db->trans_rollback();
                        //         $db_hutang->delHutang($data['notransaksi']);
                        //         $db_dbeli->delBeli($data['notransaksi']);
                        //         $db_hbeli->del($data['notransaksi']);
                                
                        //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        //         Data Pembelian gagal tersimpan!
                        //         </div>');
                        //         redirect("transaksi/detailBeli");
                        // }else{
                        //         $this->db->trans_commit();
                        //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        //         Data Pembelian berhasil tersimpan!
                        //         </div>');
                        //         redirect("transaksi/detailBeli");
                        // }

                      }else{
                        // $db_hutang->delHutang($data['notransaksi']);
                        // $db_dbeli->delBeli($data['notransaksi']);
                        // $db_hbeli->del($data['notransaksi']);
                        echo("gagal hutang");
                        echo("</br>");
                        var_dump($data);
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Data Pembelian gagal tersimpan! (hutang)
                        </div>');
                        // redirect("transaksi/detailBeli");
                      }
                  // }else{
                  //   $db_dbeli->delBeli($data['notransaksi']);
                  //   $db_hbeli->del($data['notransaksi']);

                  //   $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                  //   Data Pembelian gagal tersimpan! (dbeli)
                  //   </div>');
                  //   redirect("transaksi/detailBeli");
                  // }
                }else{
                  $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Data Pembelian tidak dapat tersimpan! duplikasi data.
                    </div>');
                    redirect("transaksi/detailBeli");
                }
                
                $i=0;
              }
          }
          
        }else{
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          Data Pembelian tidak dapat tersimpan! (header)
          </div>');
          redirect("transaksi/detailBeli");
        }
      }
    // }
      
  }

  // public function updateStok($data)
  // {
  //   $db_stok = $this->stock_model;
  //   // save/update stok
  //   if($db_stok->updateStok($data))
  //   {
  //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  //     Data berhasil tersimpan!
  //     </div>');
  //     redirect("transaksi/detailBeli");
  //   }else{
  //     $db_hutang->delHutang($data['notransaksi']);
  //     $db_dbeli->delBeli($data['notransaksi']);
  //     $db_hbeli->del($data['notransaksi']);

  //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  //     Data gagal tersimpan!
  //     </div>');
  //     redirect("transaksi/detailBeli");
  //   }
  // }

  public function viewBeli()
  {
    $data['title'] = 'Pembelian';
    $menu = $this->menu_model;
    $submenu = $this->submenu_model;
    $db_hbeli = $this->hbeli_model;
    $db_dbeli = $this->dbeli_model;

    $id = $this->uri->segment(3);


    $data['menu'] = $menu->getAllMenu();
    $data['submenu'] = $submenu->getAll();

    $data['notransaksi'] = $id;
    $data['data_hbeli'] = $db_hbeli->getJoin($id);
    $data['data_dbeli'] = $db_dbeli->getDetail($id);

    // var_dump($data['data_hbeli']);
    // var_dump($data['data_dbeli']);

    $this->load->view('component/Header', $data);
    $this->load->view('component/Navbar', $data);
    $this->load->view('component/Topbar', $data);
    $this->load->view('View_dtransaksi', $data);
    $this->load->view('component/Copyright', $data);
    $this->load->view('component/Footer');
  }
}