<?php

namespace Faker\Provider\id_ID;

class Person extends \Faker\Provider\Kategori
{

    protected static $maleNameFormats = array(
        '{{firstNameMale}} {{lastNameMale}}',
        '{{firstNameMale}} {{lastNameMale}}',
        '{{firstNameMale}} {{lastNameMale}}',
        '{{firstNameMale}} {{lastNameMale}} {{suffix}}',
        '{{firstNameMale}} {{firstNameMale}} {{lastNameMale}}',
        '{{firstNameMale}} {{firstNameMale}} {{lastNameMale}} {{suffix}}',
    );

    

    /**
     * @link http://www.nama.web.id/search.php?gender=male&origin=Indonesia+-+Jawa&letter=&submit=Search
     */
    protected static $firstNameMale = array(
        'Rumah Tangga', 'Mengatasi Tindakan Kejahatan',
    );

    /**
     * @link http://namafb.com/2010/08/12/top-1000-nama-populer-indonesia/
     */
   

    /**
     * @link http://namafb.com/2010/08/12/top-1000-nama-populer-indonesia/
     * @link http://id.wikipedia.org/wiki/Daftar_marga_suku_Batak_di_Toba
     */
    protected static $lastNameMale = array(
        'Adriansyah', 'Ardianto', 'Anggriawan', 'Budiman', 'Budiyanto',
        'Damanik', 'Dongoran', 'Dabukke', 'Firmansyah', 'Firgantoro',
        'Gunarto', 'Gunawan', 'Hardiansyah', 'Habibi', 'Hakim', 'Halim',
        'Haryanto', 'Hidayat', 'Hidayanto', 'Hutagalung', 'Hutapea', 'Hutasoit',
        'Irawan', 'Iswahyudi', 'Kuswoyo', 'Januar', 'Jailani', 'Kurniawan',
        'Kusumo', 'Latupono', 'Lazuardi', 'Maheswara', 'Mahendra', 'Mustofa',
        'Mansur', 'Mandala', 'Megantara', 'Maulana', 'Maryadi', 'Mangunsong',
        'Manullang', 'Marpaung', 'Marbun', 'Narpati', 'Natsir', 'Nugroho',
        'Najmudin', 'Nashiruddin', 'Nainggolan', 'Nababan', 'Napitupulu',
        'Pangestu', 'Putra', 'Pranowo', 'Prabowo', 'Pratama', 'Prasetya',
        'Prasetyo', 'Pradana', 'Pradipta', 'Prakasa', 'Permadi', 'Prasasta',
        'Prayoga', 'Ramadan', 'Rajasa', 'Rajata', 'Saptono', 'Santoso',
        'Saputra', 'Saefullah', 'Setiawan', 'Suryono', 'Suwarno', 'Siregar',
        'Sihombing', 'Salahudin', 'Sihombing', 'Samosir', 'Saragih', 'Sihotang',
        'Simanjuntak', 'Sinaga', 'Simbolon', 'Sitompul', 'Sitorus', 'Sirait',
        'Siregar', 'Situmorang', 'Tampubolon', 'Thamrin', 'Tamba', 'Tarihoran',
        'Utama', 'Uwais', 'Wahyudin', 'Waluyo', 'Wibowo', 'Winarno', 'Wibisono',
        'Wijaya', 'Widodo', 'Wacana', 'Waskita', 'Wasita', 'Zulkarnain',
    );

   
    
    /**
     * Return last name for male
     *
     * @access public
     * @return string last name
     */
    public static function lastNameMale()
    {
        return static::randomElement(static::$lastNameMale);
    }
}
