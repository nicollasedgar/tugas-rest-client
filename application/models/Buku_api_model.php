<?php

use GuzzleHttp\Client;

class Buku_api_model extends CI_model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/rest_web_service/'
        ]);
    }

    public function getAllBukuApi()
    {
        // dari database
        //return $this->db->get('tb_petugas')->result_array();

        //dari REST Server
        $response = $this->_client->request('GET', 'buku', [
            'query' => ['X-API-KEY' => '1818062']
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['message'];
    }

    public function getBukuApiId($ID_petugas)
    {
        $response = $this->_client->request('GET', 'buku', [
            'query' => [
                'X-API-KEY' => '1818062',
                'isbn' => $ID_petugas
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['message'][0];
    }

    public function tambahBukuApi()
    {
        $data = [
            "isbn" => $this->input->post('isbn', true),
            "judul" => $this->input->post('judul', true),
            "penulis" => $this->input->post('penulis', true),
            "penerbit" => $this->input->post('penerbit', true),
            'X-API-KEY' => '1818062'
        ];

        $response = $this->_client->request('POST', 'buku', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function hapusBukuApi($Kode_buku)
    {
        $response = $this->_client->delete('buku', [
            'form_params' => [
                'isbn' => $Kode_buku,
                'X-API-KEY' => '1818062'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function ubahDataBuku()
    {
        $data = [
            "isbn" => $this->input->post('isbn', true),
            "judul" => $this->input->post('judul', true),
            "penulis" => $this->input->post('penulis', true),
            "penerbit" => $this->input->post('penerbit', true),
            'X-API-KEY' => '1818062'
        ];

        $response = $this->_client->request('PUT', 'buku', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
}
