<?php

namespace Database\Seeders;
use \App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::create([
            'nama' => 'Mohamad Faisal Rizki',
            'nim' => '24060122130068',
            'email' => 'faisalrizki@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789011'
            // field lainnya
        ]);
        Mahasiswa::create([
            'nama' => 'Gibran Nagrib',
            'nim' => '24060122130001',
            'email' => 'gibran@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'doswal' => '123456789011'
            // field lainnya
        ]);


        Mahasiswa::Create([
            'nama' => 'Mickey Olivero Giorgi',
            'nim' => '24060120130101',
            'email' => 'mickeygiorgi@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789185'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Agustin Fulton Avigdor',
            'nim' => '24060121130128',
            'email' => 'agustinavigdor@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789038'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Cobbie Desi Clayborn',
            'nim' => '24060122120033',
            'email' => 'cobbieclayborn@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789258'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Evan Cobb Derrik',
            'nim' => '24060123140907',
            'email' => 'evanderrik@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789298'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Thom Warden Michel',
            'nim' => '24060120130115',
            'email' => 'thommichel@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789123'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Craggie Hillier Farleigh',
            'nim' => '24060125130112',
            'email' => 'craggiefarleigh@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789460'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Patin Keven Nevins',
            'nim' => '24060124130120',
            'email' => 'patinnevins@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789258'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Ransell Karney Kerwin',
            'nim' => '24060124140980',
            'email' => 'ransellkerwin@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789241'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Quinton Wyn Asher',
            'nim' => '24060124140699',
            'email' => 'quintonasher@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789005'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Gradey Neddie Maurits',
            'nim' => '24060121120089',
            'email' => 'gradeymaurits@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789468'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Roderich Devlin Trever',
            'nim' => '24060125120015',
            'email' => 'roderichtrever@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789525'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Al Basilius Vidovic',
            'nim' => '24060122130110',
            'email' => 'alvidovic@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789532'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Bear Symon Flint',
            'nim' => '24060123140968',
            'email' => 'bearflint@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789067'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Eben Erie Lindsay',
            'nim' => '24060120130117',
            'email' => 'ebenlindsay@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789505'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Sergeant Arvie Tymon',
            'nim' => '24060122140957',
            'email' => 'sergeanttymon@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789250'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Ram Elia Gabriel',
            'nim' => '24060125120038',
            'email' => 'ramgabriel@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789091'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Alec Omero Cord',
            'nim' => '24060124140963',
            'email' => 'aleccord@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789485'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Sigismondo Silas Webb',
            'nim' => '24060122140166',
            'email' => 'sigismondowebb@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789448'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Mathew Tally Westbrooke',
            'nim' => '24060123120014',
            'email' => 'mathewwestbrooke@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789227'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Alistair Shannan Antonino',
            'nim' => '24060123140195',
            'email' => 'alistairantonino@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789067'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Shay Gordon Hewitt',
            'nim' => '24060125140751',
            'email' => 'shayhewitt@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789592'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Bartholomew Tedie Morgan',
            'nim' => '24060125120040',
            'email' => 'bartholomewmorgan@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789227'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Rip Teddie Kenyon',
            'nim' => '24060122140277',
            'email' => 'ripkenyon@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789241'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Kristopher Kahaleel Issiah',
            'nim' => '24060123140757',
            'email' => 'kristopherissiah@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789485'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Travis Temp Ignacius',
            'nim' => '24060125120042',
            'email' => 'travisignacius@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789452'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Trip Verney Ruy',
            'nim' => '24060124120057',
            'email' => 'tripruy@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789129'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Allister Tremaine Basil',
            'nim' => '24060122130130',
            'email' => 'allisterbasil@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789340'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Tobe Berne Briano',
            'nim' => '24060120130125',
            'email' => 'tobebriano@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789307'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Gaylord Akim Salomon',
            'nim' => '24060121120056',
            'email' => 'gaylordsalomon@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789311'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Liam Miles Dermot',
            'nim' => '24060121140908',
            'email' => 'liamdermot@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789005'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Dur Baxy Weber',
            'nim' => '24060122140600',
            'email' => 'durweber@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789429'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Xymenes Cozmo Myca',
            'nim' => '24060125130111',
            'email' => 'xymenesmyca@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789555'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Tarrance Ellwood Cosimo',
            'nim' => '24060124140727',
            'email' => 'tarrancecosimo@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789241'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Guglielmo Freemon Dare',
            'nim' => '24060120130127',
            'email' => 'guglielmodare@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789340'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Natal Mata Hilliard',
            'nim' => '24060124130105',
            'email' => 'natalhilliard@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789129'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Tobe Gilles Huntley',
            'nim' => '24060125140753',
            'email' => 'tobehuntley@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789563'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Orrin Drew Monti',
            'nim' => '24060121120084',
            'email' => 'orrinmonti@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789354'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Eugenio Guillermo Maximo',
            'nim' => '24060123120080',
            'email' => 'eugeniomaximo@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789461'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Skippie Dalton Mortie',
            'nim' => '24060121130114',
            'email' => 'skippiemortie@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789005'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Lindon Jules Tulley',
            'nim' => '24060124140771',
            'email' => 'lindontulley@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789339'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Napoleon Joshia Vinnie',
            'nim' => '24060120120096',
            'email' => 'napoleonvinnie@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789527'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Patton Benedict Urson',
            'nim' => '24060123120081',
            'email' => 'pattonurson@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789044'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Bard Reinold Antoine',
            'nim' => '24060121130107',
            'email' => 'bardantoine@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789140'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Luca Gerhard Gustave',
            'nim' => '24060121140327',
            'email' => 'lucagustave@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789468'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Cleveland Marcello Jesse',
            'nim' => '24060122120021',
            'email' => 'clevelandjesse@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789354'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Eamon Murdock Somerset',
            'nim' => '24060122140897',
            'email' => 'eamonsomerset@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789555'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Byram Ollie Ezechiel',
            'nim' => '24060121140481',
            'email' => 'byramezechiel@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789593'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Eustace Arri Prinz',
            'nim' => '24060123140899',
            'email' => 'eustaceprinz@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789217'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Terrill Lorne Federico',
            'nim' => '24060123140319',
            'email' => 'terrillfederico@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789555'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Craig Con Blaine',
            'nim' => '24060120140637',
            'email' => 'craigblaine@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789513'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Raymond Creight Benton',
            'nim' => '24060121120061',
            'email' => 'raymondbenton@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789050'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Karlens Lee Cash',
            'nim' => '24060122130100',
            'email' => 'karlenscash@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789026'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Dene Eddy Richy',
            'nim' => '24060125120065',
            'email' => 'denerichy@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789067'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Jerrie Cecilio Base',
            'nim' => '24060121120087',
            'email' => 'jerriebase@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789532'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Sandro Charlie Manny',
            'nim' => '2406012412004',
            'email' => 'sandromanny@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789210'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Allin Lin Garrott',
            'nim' => '24060125120031',
            'email' => 'allingarrott@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789026'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Ernestus Agosto Steffen',
            'nim' => '24060125120047',
            'email' => 'ernestussteffen@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789241'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Oliver Zack Erik',
            'nim' => '24060120120011',
            'email' => 'olivererik@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789034'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Stu Raimondo Wynn',
            'nim' => '24060124140396',
            'email' => 'stuwynn@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789452'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Hurleigh Pincas Roland',
            'nim' => '24060120120071',
            'email' => 'hurleighroland@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789088'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Mayne Peirce Ryley',
            'nim' => '24060125130103',
            'email' => 'mayneryley@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789468'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Rufus Fonzie Ernst',
            'nim' => '24060123120075',
            'email' => 'rufusernst@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789005'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Toiboid Scottie Mel',
            'nim' => '24060120140817',
            'email' => 'toiboidmel@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789067'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Redd Abel Ezri',
            'nim' => '24060123120093',
            'email' => 'reddezri@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789185'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Farrell Alexei Granville',
            'nim' => '24060120140174',
            'email' => 'farrellgranville@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789284'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Lowrance Shelton Von',
            'nim' => '24060124140311',
            'email' => 'lowrancevon@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789448'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Vaughan Benjy Alaster',
            'nim' => '24060124130122',
            'email' => 'vaughanalaster@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789140'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Sansone Mathe Jens',
            'nim' => '24060122130102',
            'email' => 'sansonejens@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789380'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Halsey Guilbert Gradeigh',
            'nim' => '24060121120086',
            'email' => 'halseygradeigh@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789308'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Clarke Cob Danny',
            'nim' => '24060120140405',
            'email' => 'clarkedanny@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789088'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Herve Geordie Ingemar',
            'nim' => '24060121140729',
            'email' => 'herveingemar@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789185'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Dana Ralf Hymie',
            'nim' => '24060123120059',
            'email' => 'danahymie@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789050'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Stafford Bondie Gasper',
            'nim' => '24060122130109',
            'email' => 'staffordgasper@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789567'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Jacobo Hermann Haskell',
            'nim' => '24060121120058',
            'email' => 'jacobohaskell@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789307'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Trevar Ruttger Davin',
            'nim' => '24060121140762',
            'email' => 'trevardavin@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789174'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Judas Bailie Willi',
            'nim' => '24060124140932',
            'email' => 'judaswilli@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789174'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Raffarty Taite Hogan',
            'nim' => '24060122140515',
            'email' => 'raffartyhogan@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789231'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Ashlin Dunn Abby',
            'nim' => '24060121120092',
            'email' => 'ashlinabby@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789231'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Jude Ilaire Bren',
            'nim' => '24060121120073',
            'email' => 'judebren@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789038'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Larry Waldemar Bart',
            'nim' => '24060121140186',
            'email' => 'larrybart@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789594'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Jared Fredek Gareth',
            'nim' => '24060125120095',
            'email' => 'jaredgareth@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789091'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Gael Lothario Dermot',
            'nim' => '24060120140930',
            'email' => 'gaeldermot@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789527'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Worden Ernestus Zacharie',
            'nim' => '24060120140478',
            'email' => 'wordenzacharie@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789174'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Simmonds Ara Felicio',
            'nim' => '24060122140517',
            'email' => 'simmondsfelicio@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789532'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Jaymie Karlik Locke',
            'nim' => '24060122140348',
            'email' => 'jaymielocke@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789425'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Bradan Vance Garik',
            'nim' => '24060122140869',
            'email' => 'bradangarik@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789351'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Seumas Filippo Kahaleel',
            'nim' => '24060123140143',
            'email' => 'seumaskahaleel@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789307'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Ugo Karlan Stanislas',
            'nim' => '24060124120077',
            'email' => 'ugostanislas@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789418'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Lenard Isidor Jayson',
            'nim' => '24060120120094',
            'email' => 'lenardjayson@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789339'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Beale Marlowe Doug',
            'nim' => '24060120120017',
            'email' => 'bealedoug@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789412'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Orlando Wylie Salim',
            'nim' => '24060121140488',
            'email' => 'orlandosalim@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789425'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Rurik Artair Dewain',
            'nim' => '24060120140358',
            'email' => 'rurikdewain@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789450'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Niel Clerc Kimbell',
            'nim' => '24060123140738',
            'email' => 'nielkimbell@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789311'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Jeremy Zechariah Heinrick',
            'nim' => '24060123140587',
            'email' => 'jeremyheinrick@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789290'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Reagan Abbie Thaddeus',
            'nim' => '24060125140372',
            'email' => 'reaganthaddeus@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789448'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Dilan Branden Sutherlan',
            'nim' => '24060125140498',
            'email' => 'dilansutherlan@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789479'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Bancroft Dore Constantin',
            'nim' => '24060125140779',
            'email' => 'bancroftconstantin@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789450'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Barris Jacob Ronald',
            'nim' => '24060121140598',
            'email' => 'barrisronald@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789338'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Arte Bartlet Lothaire',
            'nim' => '24060121140643',
            'email' => 'artelothaire@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789067'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Blaine Klement Foss',
            'nim' => '24060120130113',
            'email' => 'blainefoss@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789229'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Chase Ignacio Gaven',
            'nim' => '24060121140554',
            'email' => 'chasegaven@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789002'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Larry Gunter Benton',
            'nim' => '24060123120035',
            'email' => 'larrybenton@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789340'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Raoul Otho Nealson',
            'nim' => '24060123120048',
            'email' => 'raoulnealson@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789088'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Steffen Bertie Frederico',
            'nim' => '24060125130118',
            'email' => 'steffenfrederico@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789513'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Royall Andrey Titus',
            'nim' => '24060124140610',
            'email' => 'royalltitus@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789047'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Dav Leigh Mead',
            'nim' => '24060121130126',
            'email' => 'davmead@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789460'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Mic Hastings Oran',
            'nim' => '24060123140376',
            'email' => 'micoran@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789005'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Brucie Lukas Abdel',
            'nim' => '24060122140160',
            'email' => 'brucieabdel@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789532'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Mortie Silvan Dar',
            'nim' => '24060122130123',
            'email' => 'mortiedar@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789038'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Holden Thom Durand',
            'nim' => '24060125140617',
            'email' => 'holdendurand@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789227'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Garv Weston Kirk',
            'nim' => '24060121140684',
            'email' => 'garvkirk@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789311'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Demetri Ram Esdras',
            'nim' => '24060124130124',
            'email' => 'demetriesdras@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789452'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Luca Benedicto Samuele',
            'nim' => '24060122120074',
            'email' => 'lucasamuele@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789340'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Granger Jareb Guilbert',
            'nim' => '24060124120034',
            'email' => 'grangerguilbert@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789034'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Alonso Renard Scot',
            'nim' => '2406012012002',
            'email' => 'alonsoscot@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789493'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Duke Silas Benito',
            'nim' => '24060123140216',
            'email' => 'dukebenito@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789026'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Fabiano Alick Nicholas',
            'nim' => '24060122120055',
            'email' => 'fabianonicholas@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789212'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Lukas Felizio Tremaine',
            'nim' => '24060124140142',
            'email' => 'lukastremaine@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789131'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Egbert Mal Maurise',
            'nim' => '24060121120044',
            'email' => 'egbertmaurise@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789389'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Robinet Reese Karlan',
            'nim' => '24060125120036',
            'email' => 'robinetkarlan@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789396'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Chase Dolph Henry',
            'nim' => '24060121120067',
            'email' => 'chasehenry@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789227'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Carter Lanie Quinton',
            'nim' => '2406012112009',
            'email' => 'carterquinton@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789352'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Renard Jeremias Vinny',
            'nim' => '2406012312003',
            'email' => 'renardvinny@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789429'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Thedric Aluin Gardy',
            'nim' => '24060125140596',
            'email' => 'thedricgardy@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789452'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Bent Patrizius Donall',
            'nim' => '24060121140582',
            'email' => 'bentdonall@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789448'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Clive Jamesy Dallon',
            'nim' => '24060121140417',
            'email' => 'clivedallon@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789185'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Kaiser Saleem Sebastiano',
            'nim' => '24060123120051',
            'email' => 'kaisersebastiano@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789191'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Isidor Earlie Frederik',
            'nim' => '24060120120097',
            'email' => 'isidorfrederik@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789338'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Jerrome Ingmar Ozzie',
            'nim' => '24060125140552',
            'email' => 'jerromeozzie@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789044'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Michale Edmund Nils',
            'nim' => '24060125120078',
            'email' => 'michalenils@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789389'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Xenos Mathew Kevon',
            'nim' => '2406012112001',
            'email' => 'xenoskevon@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789210'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Dwight Lock Ransell',
            'nim' => '24060122140265',
            'email' => 'dwightransell@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789124'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Brand Court Bran',
            'nim' => '24060121120022',
            'email' => 'brandbran@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789418'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Boycey Holt Markos',
            'nim' => '24060123140543',
            'email' => 'boyceymarkos@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789391'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Tore Lucio Jim',
            'nim' => '24060123140565',
            'email' => 'torejim@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789207'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Clare Keefe Weber',
            'nim' => '24060121120028',
            'email' => 'clareweber@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789354'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Obadiah Edsel Micky',
            'nim' => '24060121120029',
            'email' => 'obadiahmicky@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789514'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Nicola Norrie Bartholomeo',
            'nim' => '24060122120070',
            'email' => 'nicolabartholomeo@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789050'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Brad Linus Tanny',
            'nim' => '24060122130119',
            'email' => 'bradtanny@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789044'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Wells Berton Massimiliano',
            'nim' => '24060122140867',
            'email' => 'wellsmassimiliano@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789124'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Walton Hakeem Mattheus',
            'nim' => '24060125120043',
            'email' => 'waltonmattheus@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789593'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Horten Geno Diarmid',
            'nim' => '24060124120099',
            'email' => 'hortendiarmid@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789531'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Pietrek Cello Lockwood',
            'nim' => '24060120140667',
            'email' => 'pietreklockwood@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789592'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Hilliard Ber Erl',
            'nim' => '24060123140660',
            'email' => 'hilliarderl@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789123'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Hamel Jay Hilly',
            'nim' => '24060123140306',
            'email' => 'hamelhilly@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789191'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Desmond Kaine Hamlen',
            'nim' => '24060123140641',
            'email' => 'desmondhamlen@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789131'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Marv Frederich Kele',
            'nim' => '24060122140764',
            'email' => 'marvkele@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789171'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Arte James Rollin',
            'nim' => '24060123140662',
            'email' => 'arterollin@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789044'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Chaim Yurik Harp',
            'nim' => '24060123140268',
            'email' => 'chaimharp@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789308'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Tad Cchaddie Carey',
            'nim' => '24060121120046',
            'email' => 'tadcarey@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789290'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Conn Flinn Boycey',
            'nim' => '24060123140747',
            'email' => 'connboycey@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789054'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Isiahi Hamish Jase',
            'nim' => '24060121140146',
            'email' => 'isiahijase@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789144'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Maxim Trace Hamid',
            'nim' => '24060125140151',
            'email' => 'maximhamid@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789493'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Steffen Itch Danya',
            'nim' => '24060125140184',
            'email' => 'steffendanya@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789088'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Waylen Winston Shelden',
            'nim' => '24060125140535',
            'email' => 'waylenshelden@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789461'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Dominick Lamar Tristan',
            'nim' => '24060125140233',
            'email' => 'dominicktristan@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789241'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Ulberto Duncan Boycie',
            'nim' => '24060121140590',
            'email' => 'ulbertoboycie@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789514'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Ragnar Vin Godard',
            'nim' => '24060124140279',
            'email' => 'ragnargodard@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789532'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Chancey Irwin Danie',
            'nim' => '24060124120010',
            'email' => 'chanceydanie@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789088'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Cullie Alister Roosevelt',
            'nim' => '24060120120060',
            'email' => 'cullieroosevelt@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789567'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Brant Kimball Cord',
            'nim' => '24060125140149',
            'email' => 'brantcord@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789026'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Reynolds Carce Weylin',
            'nim' => '24060123140634',
            'email' => 'reynoldsweylin@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789231'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Bobby Ignazio Tobit',
            'nim' => '24060125140892',
            'email' => 'bobbytobit@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789285'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Garret Menard Rockie',
            'nim' => '24060122140367',
            'email' => 'garretrockie@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789185'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Winston August Yank',
            'nim' => '24060123120085',
            'email' => 'winstonyank@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789555'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Barry Burnard Noll',
            'nim' => '24060124140309',
            'email' => 'barrynoll@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789532'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Killie Cleavland Gerick',
            'nim' => '24060120140556',
            'email' => 'killiegerick@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789479'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Eamon Francklin Gerard',
            'nim' => '24060122140403',
            'email' => 'eamongerard@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789123'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Miles Averill Parnell',
            'nim' => '24060120130106',
            'email' => 'milesparnell@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789354'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Karlik Nicolas Farly',
            'nim' => '24060120140448',
            'email' => 'karlikfarly@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789129'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Linc Royce Kerr',
            'nim' => '24060123120069',
            'email' => 'linckerr@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789592'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Uri Lothaire Carmine',
            'nim' => '24060125140499',
            'email' => 'uricarmine@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789174'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Ichabod Graham Giffie',
            'nim' => '24060123140576',
            'email' => 'ichabodgiffie@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789123'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Cort Tallie Huntington',
            'nim' => '24060124120079',
            'email' => 'corthuntington@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789123'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Hunter Benny Freddie',
            'nim' => '24060124140508',
            'email' => 'hunterfreddie@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789485'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Cirilo Cory Bartholomew',
            'nim' => '24060124140283',
            'email' => 'cirilobartholomew@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789567'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Murdoch Saleem Peyter',
            'nim' => '24060125140462',
            'email' => 'murdochpeyter@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789460'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Basil Upton Chariot',
            'nim' => '24060124120016',
            'email' => 'basilchariot@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789418'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Merell Cristian Cletis',
            'nim' => '24060122140223',
            'email' => 'merellcletis@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789217'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Mort DArcy Connor',
            'nim' => '24060123140281',
            'email' => 'mortconnor@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789139'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Hillyer Dom Pattie',
            'nim' => '24060125140749',
            'email' => 'hillyerpattie@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789547'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Mickie Herb Dill',
            'nim' => '24060122140261',
            'email' => 'mickiedill@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789185'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Dionisio Angie Gottfried',
            'nim' => '24060120140760',
            'email' => 'dionisiogottfried@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789354'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Trace Obadiah Bourke',
            'nim' => '24060124120027',
            'email' => 'tracebourke@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789050'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Aymer Husein Carney',
            'nim' => '24060121140745',
            'email' => 'aymercarney@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789194'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Massimo Thatch Knox',
            'nim' => '24060123140251',
            'email' => 'massimoknox@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789185'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Andrea Hercules Gayler',
            'nim' => '24060124140440',
            'email' => 'andreagayler@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789124'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Buddy Israel Tucker',
            'nim' => '2406012012008',
            'email' => 'buddytucker@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789088'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Phineas Ives Mayer',
            'nim' => '24060120140537',
            'email' => 'phineasmayer@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789555'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Terrell Lawrence Ewell',
            'nim' => '24060124140176',
            'email' => 'terrellewell@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789330'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Enrique Konstantin Cass',
            'nim' => '24060124130129',
            'email' => 'enriquecass@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789227'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Darn Giacomo Shurwood',
            'nim' => '24060123140652',
            'email' => 'darnshurwood@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789068'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Pennie Waldon Roley',
            'nim' => '24060122140475',
            'email' => 'pennieroley@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789505'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Barde Pennie Chip',
            'nim' => '24060123140182',
            'email' => 'bardechip@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789567'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Eziechiele Percival Jermaine',
            'nim' => '24060123140155',
            'email' => 'eziechielejermaine@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789330'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Bucky Aron Renaldo',
            'nim' => '24060125140153',
            'email' => 'buckyrenaldo@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789338'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Zedekiah Torr Taylor',
            'nim' => '24060123140511',
            'email' => 'zedekiahtaylor@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789002'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Robinet Lock Kaine',
            'nim' => '24060122140244',
            'email' => 'robinetkaine@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789525'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Gunar Kirk Cosme',
            'nim' => '24060122120076',
            'email' => 'gunarcosme@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789563'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Curr Luke Dalis',
            'nim' => '24060121140384',
            'email' => 'currdalis@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789210'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Davy Delmar Jens',
            'nim' => '24060122140380',
            'email' => 'davyjens@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789199'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Barclay Jodie Terrill',
            'nim' => '24060123140158',
            'email' => 'barclayterrill@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789352'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Porter Greggory Wayne',
            'nim' => '24060120140204',
            'email' => 'porterwayne@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789139'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Fairlie Antone Gal',
            'nim' => '24060121120039',
            'email' => 'fairliegal@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789339'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Antons Fred Geno',
            'nim' => '24060121120012',
            'email' => 'antonsgeno@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789199'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Dill Amery Riordan',
            'nim' => '24060123120063',
            'email' => 'dillriordan@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789514'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Vassili Waverley Newton',
            'nim' => '24060123140883',
            'email' => 'vassilinewton@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789290'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Monro Em Vance',
            'nim' => '2406012412005',
            'email' => 'monrovance@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789050'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Jabez Fields Joey',
            'nim' => '24060123140602',
            'email' => 'jabezjoey@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789054'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Dal Winfred Filmer',
            'nim' => '24060124120032',
            'email' => 'dalfilmer@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789241'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Galen Hayden Gabe',
            'nim' => '24060124120052',
            'email' => 'galengabe@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789468'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Errol Wilburt Hirsch',
            'nim' => '2406012212007',
            'email' => 'errolhirsch@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789370'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Sarge Wyn Syman',
            'nim' => '24060120140284',
            'email' => 'sargesyman@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789091'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Rudy Tybalt Humfried',
            'nim' => '24060124120053',
            'email' => 'rudyhumfried@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789229'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Bernarr Sim Hoyt',
            'nim' => '24060120140941',
            'email' => 'bernarrhoyt@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789199'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Rockwell Terrel Christoper',
            'nim' => '24060122130121',
            'email' => 'rockwellchristoper@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789258'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Rick Umberto Kurt',
            'nim' => '24060120140461',
            'email' => 'rickkurt@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789425'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Man Boyce Jayme',
            'nim' => '24060122140754',
            'email' => 'manjayme@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789231'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Normand Cob Cull',
            'nim' => '24060125140296',
            'email' => 'normandcull@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789389'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Murvyn Darn Yancey',
            'nim' => '2406012112006',
            'email' => 'murvynyancey@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789144'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Herc Harry Jo',
            'nim' => '24060124140705',
            'email' => 'hercjo@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789210'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Rufus Gill Flynn',
            'nim' => '24060125140627',
            'email' => 'rufusflynn@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789547'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Forrester Barr Rocky',
            'nim' => '24060121140855',
            'email' => 'forresterrocky@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789429'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Pate Gardie Dallon',
            'nim' => '24060125120020',
            'email' => 'patedallon@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789207'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Dun Ewell Cosmo',
            'nim' => '24060125140833',
            'email' => 'duncosmo@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789091'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Ari Wat Alric',
            'nim' => '24060121130108',
            'email' => 'arialric@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789592'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Randall Barri Elmer',
            'nim' => '24060125140820',
            'email' => 'randallelmer@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789124'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Tally Ned Nikki',
            'nim' => '24060121140205',
            'email' => 'tallynikki@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789418'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Zane Calvin Lammond',
            'nim' => '24060124140364',
            'email' => 'zanelammond@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789088'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Sigfrid Llewellyn Julius',
            'nim' => '24060122120088',
            'email' => 'sigfridjulius@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789426'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Geoffrey Frasco Frasier',
            'nim' => '24060123140397',
            'email' => 'geoffreyfrasier@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789227'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Ronnie Tobit Alaric',
            'nim' => '24060120140219',
            'email' => 'ronniealaric@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789034'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Benoit Dallas Normie',
            'nim' => '24060122140810',
            'email' => 'benoitnormie@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789354'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Mischa Raimondo King',
            'nim' => '24060125140561',
            'email' => 'mischaking@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789021'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Duffie Hayward Ansell',
            'nim' => '24060120140152',
            'email' => 'duffieansell@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789468'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Christophe Nikolaus Wood',
            'nim' => '24060125140226',
            'email' => 'christophewood@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789525'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Ange Delmer Damien',
            'nim' => '24060125120083',
            'email' => 'angedamien@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789091'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Olivier Nevin Ambrosius',
            'nim' => '24060125140626',
            'email' => 'olivierambrosius@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789308'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Toddie Brose Nicola',
            'nim' => '24060121140483',
            'email' => 'toddienicola@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789380'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Darin Lay Tymothy',
            'nim' => '24060121140567',
            'email' => 'darintymothy@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789241'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Bobbie Virge Orran',
            'nim' => '24060122140803',
            'email' => 'bobbieorran@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789594'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Bartholomeus Ellwood Bradan',
            'nim' => '24060124140977',
            'email' => 'bartholomeusbradan@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789338'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Jessey Eben Drud',
            'nim' => '24060122140974',
            'email' => 'jesseydrud@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789527'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Jeffie Rowland Maurizio',
            'nim' => '24060121120041',
            'email' => 'jeffiemaurizio@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789217'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Tannie Carl Stevy',
            'nim' => '24060124140215',
            'email' => 'tanniestevy@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789460'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Flin Hubie Sylvan',
            'nim' => '24060121140133',
            'email' => 'flinsylvan@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789131'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Addy Jackie Giordano',
            'nim' => '24060122140644',
            'email' => 'addygiordano@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789527'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Ferdie Egan Patty',
            'nim' => '24060125140695',
            'email' => 'ferdiepatty@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789308'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Broddy Vasily Park',
            'nim' => '24060121120091',
            'email' => 'broddypark@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789210'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Beaufort Milt Dave',
            'nim' => '24060125140950',
            'email' => 'beaufortdave@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789396'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Ephraim Spence Findlay',
            'nim' => '24060120140213',
            'email' => 'ephraimfindlay@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789123'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Pietrek Drew Antone',
            'nim' => '24060123140616',
            'email' => 'pietrekantone@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789339'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Gradey Berton Angelo',
            'nim' => '24060123140661',
            'email' => 'gradeyangelo@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789210'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Gradeigh Dick Whitby',
            'nim' => '24060122140732',
            'email' => 'gradeighwhitby@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789555'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Douglass Nils Danny',
            'nim' => '24060124140227',
            'email' => 'douglassdanny@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789513'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Leo Terri Boris',
            'nim' => '24060120130116',
            'email' => 'leoboris@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789338'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Euell Flint Perkin',
            'nim' => '24060122140528',
            'email' => 'euellperkin@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789594'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Frankie Aloysius Westleigh',
            'nim' => '24060120120062',
            'email' => 'frankiewestleigh@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789505'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Otes Valentijn Kareem',
            'nim' => '24060124140863',
            'email' => 'oteskareem@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789088'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Buddie Bancroft Levi',
            'nim' => '24060122120025',
            'email' => 'buddielevi@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789352'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Urbain Jarrid Vittorio',
            'nim' => '24060123140496',
            'email' => 'urbainvittorio@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789532'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Merrick Dwayne Burgess',
            'nim' => '24060125140156',
            'email' => 'merrickburgess@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789047'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Marijn Marcus Tannie',
            'nim' => '24060121140998',
            'email' => 'marijntannie@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789044'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Grantham Jamison Darb',
            'nim' => '24060124140982',
            'email' => 'granthamdarb@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789131'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Orrin Sheffield Jae',
            'nim' => '24060122120082',
            'email' => 'orrinjae@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789194'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Hodge Travers Benson',
            'nim' => '24060125140532',
            'email' => 'hodgebenson@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789412'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Constantin Ferd Shermy',
            'nim' => '24060124140997',
            'email' => 'constantinshermy@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789174'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Ogden Yorke Reinald',
            'nim' => '24060124140673',
            'email' => 'ogdenreinald@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789005'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Gregg Wilt Pepito',
            'nim' => '24060120140293',
            'email' => 'greggpepito@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789396'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Avram Trumann Alley',
            'nim' => '24060121140134',
            'email' => 'avramalley@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789171'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Siffre Marven Kit',
            'nim' => '24060124130104',
            'email' => 'siffrekit@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789005'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Chaim Haley Cleveland',
            'nim' => '24060123140544',
            'email' => 'chaimcleveland@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789091'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Hammad Alphard Durant',
            'nim' => '24060121140568',
            'email' => 'hammaddurant@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789068'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Xymenes Tracy Bernie',
            'nim' => '24060124120054',
            'email' => 'xymenesbernie@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789191'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Palm Gib Francklin',
            'nim' => '24060121140625',
            'email' => 'palmfrancklin@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789527'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Arlan Richardo Homerus',
            'nim' => '24060121120090',
            'email' => 'arlanhomerus@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789448'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Mickey Gerhard Tynan',
            'nim' => '24060122140612',
            'email' => 'mickeytynan@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789124'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Erik Micheal Spence',
            'nim' => '24060120140419',
            'email' => 'erikspence@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789023'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Giulio Kale Gregorio',
            'nim' => '24060125140772',
            'email' => 'giuliogregorio@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789505'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Alistair Eddy Averill',
            'nim' => '24060123120064',
            'email' => 'alistairaverill@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789485'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Demetre Lydon Araldo',
            'nim' => '24060124140139',
            'email' => 'demetrearaldo@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789034'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Murdock Gregorio Roi',
            'nim' => '24060120140906',
            'email' => 'murdockroi@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789124'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Itch Justino Arne',
            'nim' => '24060121140437',
            'email' => 'itcharne@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789068'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Cecil Hank Lindsey',
            'nim' => '24060121140428',
            'email' => 'cecillindsey@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789493'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Hobey Noland Filbert',
            'nim' => '24060120140228',
            'email' => 'hobeyfilbert@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789412'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Reg Cassie Immanuel',
            'nim' => '24060120140914',
            'email' => 'regimmanuel@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789023'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Judas Wilmer Eal',
            'nim' => '24060121140938',
            'email' => 'judaseal@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789452'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Bearnard Barton Galen',
            'nim' => '24060125140793',
            'email' => 'bearnardgalen@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789005'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Andrew Barde Henderson',
            'nim' => '24060120120023',
            'email' => 'andrewhenderson@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789023'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Ellswerth Chane Brnaba',
            'nim' => '24060123140252',
            'email' => 'ellswerthbrnaba@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789592'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Markos Parker Gayelord',
            'nim' => '24060124140706',
            'email' => 'markosgayelord@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789385'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Edsel Reggie Brandtr',
            'nim' => '24060122140609',
            'email' => 'edselbrandtr@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789210'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Benn Faber Early',
            'nim' => '24060121140679',
            'email' => 'bennearly@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789391'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Briano Igor Clemmie',
            'nim' => '24060121140949',
            'email' => 'brianoclemmie@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789023'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Merill Elton Sunny',
            'nim' => '24060123140177',
            'email' => 'merillsunny@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789505'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Shay Sim Ollie',
            'nim' => '24060125140431',
            'email' => 'shayollie@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789231'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Gamaliel Benedetto Bartholomew',
            'nim' => '24060122140742',
            'email' => 'gamalielbartholomew@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789207'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Perry Amerigo Maynord',
            'nim' => '24060125140947',
            'email' => 'perrymaynord@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789023'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Waite Arty Jack',
            'nim' => '24060122140295',
            'email' => 'waitejack@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789592'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Cooper Allard Wake',
            'nim' => '24060120140805',
            'email' => 'cooperwake@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789290'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Travis Geno Curran',
            'nim' => '24060120140269',
            'email' => 'traviscurran@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789131'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Dennet Lucian Jerri',
            'nim' => '24060121140845',
            'email' => 'dennetjerri@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789199'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Yorgos Michel West',
            'nim' => '24060124140203',
            'email' => 'yorgoswest@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789124'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Gan Humbert Corrie',
            'nim' => '24060120140540',
            'email' => 'gancorrie@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789514'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Antonio Burtie Damon',
            'nim' => '24060122140558',
            'email' => 'antoniodamon@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789144'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Bondon Rutter Vite',
            'nim' => '24060124140264',
            'email' => 'bondonvite@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789047'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Davie Jerry Paddy',
            'nim' => '24060122140362',
            'email' => 'daviepaddy@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789050'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Horton Daren Zacharie',
            'nim' => '24060122140952',
            'email' => 'hortonzacharie@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789088'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Ferrel Jarid Buiron',
            'nim' => '24060124140509',
            'email' => 'ferrelbuiron@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789354'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Brod Martyn Greggory',
            'nim' => '24060120140746',
            'email' => 'brodgreggory@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789067'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Donn Lindon Zak',
            'nim' => '24060122140827',
            'email' => 'donnzak@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789284'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Woodie Magnum Phip',
            'nim' => '24060123140912',
            'email' => 'woodiephip@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789531'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Kile Pietro Ram',
            'nim' => '24060124120050',
            'email' => 'kileram@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789555'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Gregor Rube Kippy',
            'nim' => '24060120120049',
            'email' => 'gregorkippy@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789593'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Brockie Gibbie Chen',
            'nim' => '24060124140584',
            'email' => 'brockiechen@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789124'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Rolf Konrad Aldis',
            'nim' => '24060123120030',
            'email' => 'rolfaldis@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789191'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Stanislaus Don Elmore',
            'nim' => '24060124140237',
            'email' => 'stanislauselmore@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789426'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Buddie Sherwynd Colman',
            'nim' => '24060124140329',
            'email' => 'buddiecolman@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789391'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Kip Decca Pincas',
            'nim' => '24060125140181',
            'email' => 'kippincas@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789250'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Harald Norrie Conn',
            'nim' => '24060122140416',
            'email' => 'haraldconn@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789258'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Cole Freddie Jameson',
            'nim' => '24060120140784',
            'email' => 'colejameson@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789479'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Krishna Guthry Gabby',
            'nim' => '24060125140420',
            'email' => 'krishnagabby@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789021'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Neil Harland Lauritz',
            'nim' => '24060120140910',
            'email' => 'neillauritz@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789026'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Gamaliel Laurie Jim',
            'nim' => '24060121140490',
            'email' => 'gamalieljim@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789468'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Sayre Theobald Jedidiah',
            'nim' => '24060124120024',
            'email' => 'sayrejedidiah@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789330'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Merv Hadlee Ara',
            'nim' => '24060120140545',
            'email' => 'mervara@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789371'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Anton Bern Waverly',
            'nim' => '24060123140533',
            'email' => 'antonwaverly@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789479'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Boony Fitzgerald Mason',
            'nim' => '24060123140923',
            'email' => 'boonymason@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789185'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Alanson Brocky Morry',
            'nim' => '24060122120066',
            'email' => 'alansonmorry@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789044'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Braden Ken Eustace',
            'nim' => '24060120140328',
            'email' => 'bradeneustace@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789389'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Flinn Leslie Daron',
            'nim' => '24060125140948',
            'email' => 'flinndaron@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789425'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Selig Wallis Seymour',
            'nim' => '24060122140895',
            'email' => 'seligseymour@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789385'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Maurice Law Shelby',
            'nim' => '24060120140529',
            'email' => 'mauriceshelby@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789290'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Frederico Duane Howey',
            'nim' => '24060125140138',
            'email' => 'fredericohowey@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789005'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Marcos Ram Renault',
            'nim' => '24060124140341',
            'email' => 'marcosrenault@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789330'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Pyotr Ferdie Franklin',
            'nim' => '24060120140868',
            'email' => 'pyotrfranklin@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789351'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Aylmar Julian Antony',
            'nim' => '24060122140781',
            'email' => 'aylmarantony@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789555'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Obadiah Nathanial Thurston',
            'nim' => '24060121140767',
            'email' => 'obadiahthurston@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789144'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Emile Nappie Titus',
            'nim' => '24060124140954',
            'email' => 'emiletitus@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789191'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Hadley Penrod Filberto',
            'nim' => '24060120140671',
            'email' => 'hadleyfilberto@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789479'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Noach Ralph Todd',
            'nim' => '24060125140282',
            'email' => 'noachtodd@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789284'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Mick Vittorio Russ',
            'nim' => '24060122140862',
            'email' => 'mickruss@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789054'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Stillmann Jermayne Jeremy',
            'nim' => '24060123140834',
            'email' => 'stillmannjeremy@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789308'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Tobias Theo Kleon',
            'nim' => '24060120140651',
            'email' => 'tobiaskleon@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789389'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Edd Kennan Coleman',
            'nim' => '24060121140287',
            'email' => 'eddcoleman@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789011'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Foster Erskine Lydon',
            'nim' => '24060121140992',
            'email' => 'fosterlydon@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789044'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Guido Iggy Hodge',
            'nim' => '24060120120018',
            'email' => 'guidohodge@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789129'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Maurice Quintus Duane',
            'nim' => '24060124140601',
            'email' => 'mauriceduane@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789354'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Brewer Samuel Guntar',
            'nim' => '24060125140342',
            'email' => 'brewerguntar@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789210'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Cleavland Sterling Bastian',
            'nim' => '24060122120045',
            'email' => 'cleavlandbastian@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789593'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Vin Bartlett Bat',
            'nim' => '24060120140137',
            'email' => 'vinbat@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789308'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Dwain Vite Harwell',
            'nim' => '24060123140412',
            'email' => 'dwainharwell@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789594'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Pierce Piotr Lazarus',
            'nim' => '24060122140235',
            'email' => 'piercelazarus@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789485'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Wash Lonnie Grantley',
            'nim' => '24060125140936',
            'email' => 'washgrantley@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789023'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Adrian Haroun Demetrius',
            'nim' => '24060123140566',
            'email' => 'adriandemetrius@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789091'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Jarret Nichols Rainer',
            'nim' => '24060122140495',
            'email' => 'jarretrainer@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789525'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Wallace Patten Cordy',
            'nim' => '24060121140214',
            'email' => 'wallacecordy@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789354'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Anselm Raffaello Glenden',
            'nim' => '24060124140473',
            'email' => 'anselmglenden@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789338'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Lincoln Wolfy Alden',
            'nim' => '24060120140933',
            'email' => 'lincolnalden@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789038'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Sax Orbadiah Bearnard',
            'nim' => '24060125140288',
            'email' => 'saxbearnard@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789054'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Edvard Claybourne Cecilius',
            'nim' => '24060124140690',
            'email' => 'edvardcecilius@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789370'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Robin Truman Lloyd',
            'nim' => '24060121140353',
            'email' => 'robinlloyd@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789531'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Colman Lazar Jarid',
            'nim' => '24060125140688',
            'email' => 'colmanjarid@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789527'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Rog Titus Perice',
            'nim' => '24060125140147',
            'email' => 'rogperice@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789050'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Rey Rudolph Judon',
            'nim' => '24060124140884',
            'email' => 'reyjudon@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789448'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Gordan Alasdair Tamas',
            'nim' => '24060123140447',
            'email' => 'gordantamas@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789021'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Porter Clare Abbey',
            'nim' => '24060120120037',
            'email' => 'porterabbey@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789068'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Lars Reynard Nevil',
            'nim' => '24060120140877',
            'email' => 'larsnevil@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789044'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Elias Siegfried Cletis',
            'nim' => '24060125140549',
            'email' => 'eliascletis@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789123'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Ronny Lodovico Brendon',
            'nim' => '24060120140209',
            'email' => 'ronnybrendon@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789527'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Waring Ced Myrwyn',
            'nim' => '24060121140285',
            'email' => 'waringmyrwyn@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789567'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Aland Trumaine Henderson',
            'nim' => '24060120120072',
            'email' => 'alandhenderson@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789389'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Rouvin Neils Delaney',
            'nim' => '24060122140366',
            'email' => 'rouvindelaney@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789425'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Boothe Odo Reinhard',
            'nim' => '24060125140463',
            'email' => 'boothereinhard@students.undip.ac.id',
            'kode_prodi' => 'FISS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789514'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Scarface Jerad Bjorn',
            'nim' => '24060125140350',
            'email' => 'scarfacebjorn@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789284'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Ramon Remus Darrick',
            'nim' => '24060121140726',
            'email' => 'ramondarrick@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789396'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Hurley Estevan Ricardo',
            'nim' => '24060121140812',
            'email' => 'hurleyricardo@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789091'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Scotti Godwin Thornton',
            'nim' => '24060122140979',
            'email' => 'scottithornton@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789144'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Uri Ricki Charley',
            'nim' => '24060121140522',
            'email' => 'uricharley@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789429'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Obie Isidor Gannie',
            'nim' => '24060122140990',
            'email' => 'obiegannie@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789131'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Bancroft Herman Levon',
            'nim' => '24060123140939',
            'email' => 'bancroftlevon@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2023',
            'doswal' => '123456789300'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Cleon Barris Timotheus',
            'nim' => '24060122140719',
            'email' => 'cleontimotheus@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789023'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Berton Martin Abbe',
            'nim' => '24060125140267',
            'email' => 'bertonabbe@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789340'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Brenden Valle Bren',
            'nim' => '24060125120013',
            'email' => 'brendenbren@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789091'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Cullin Haily Stanford',
            'nim' => '24060122140844',
            'email' => 'cullinstanford@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789047'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Reinaldo Lyle Armin',
            'nim' => '24060122140344',
            'email' => 'reinaldoarmin@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789011'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Gothart Emmett Ravid',
            'nim' => '24060125140256',
            'email' => 'gothartravid@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789284'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Malvin Rex Freemon',
            'nim' => '24060122140851',
            'email' => 'malvinfreemon@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789311'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Rab Francklin Carleton',
            'nim' => '24060125140934',
            'email' => 'rabcarleton@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789351'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Maddie Bard Euell',
            'nim' => '24060122140206',
            'email' => 'maddieeuell@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789340'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Bertie Erl Jay',
            'nim' => '24060121140840',
            'email' => 'bertiejay@students.undip.ac.id',
            'kode_prodi' => 'BIOS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789217'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Ethe Gino Jamil',
            'nim' => '24060120140347',
            'email' => 'ethejamil@students.undip.ac.id',
            'kode_prodi' => 'STATS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789448'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Gustavo Oby Consalve',
            'nim' => '24060121140850',
            'email' => 'gustavoconsalve@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2021',
            'doswal' => '123456789023'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Vassily Say Timmie',
            'nim' => '24060120140740',
            'email' => 'vassilytimmie@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2020',
            'doswal' => '123456789011'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Inness Bowie Steve',
            'nim' => '24060122140337',
            'email' => 'innesssteve@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2022',
            'doswal' => '123456789194'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Iggy Mackenzie Kelwin',
            'nim' => '24060124140187',
            'email' => 'iggykelwin@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789171'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Neddie Giles Bancroft',
            'nim' => '24060125140230',
            'email' => 'neddiebancroft@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2025',
            'doswal' => '123456789144'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Fax Ikey Sayres',
            'nim' => '24060124140141',
            'email' => 'faxsayres@students.undip.ac.id',
            'kode_prodi' => 'KIMS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789396'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Mateo Smitty Standford',
            'nim' => '24060124140541',
            'email' => 'mateostandford@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789002'
        ]);
        
        Mahasiswa::Create([
            'nama' => 'Karlens Webb Rab',
            'nim' => '24060124140866',
            'email' => 'karlensrab@students.undip.ac.id',
            'kode_prodi' => 'MATS1',
            'tahun_masuk' => '2024',
            'doswal' => '123456789140'
        ]);
    }
}
