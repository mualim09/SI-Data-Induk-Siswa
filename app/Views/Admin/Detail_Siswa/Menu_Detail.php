<div class="row mt-5">
    <div class="col-12">
        <!-- Tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class=" nav-link <?php echo $klikMenu ==  '1' ? 'active' : ''; ?>" href="/adm/snk/detail/<?= $idNISN; ?>" aria-current="page" ">Data Siswa</a>
            </li>
                                  
            <li class=" nav-item ">
                    <a class=" nav-link dropdown-toggle <?php echo $klikMenu ==  '2' ? 'active' : ''; ?>" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Nilai &nbsp;&nbsp;</a>
                <div class="dropdown-menu">
                    <?php foreach ($dataSemester->getResultArray()  as $dataSemester) : ?>
                        <a class="dropdown-item" href="/adm/snk/detailNilai/<?= $idNISN; ?>/<?= $dataSemester['ID_SEMESTER']; ?>">Semester <?= $dataSemester['ID_SEMESTER']; ?></a>
                    <?php endforeach; ?>
                </div>
            </li>
            <li class="nav-item">
                <a class=" nav-link dropdown-toggle <?php echo $klikMenu ==  '3' ? 'active' : ''; ?>" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Ekstrakurikuler &nbsp;</a>
                <div class="dropdown-menu">
                    <?php foreach ($dataSemester2->getResultArray()  as $dataSemester2) : ?>
                        <a class="dropdown-item" href="/adm/snk/eksul/<?= $idNISN; ?>/<?= $dataSemester2['ID_SEMESTER']; ?>">Semester <?= $dataSemester2['ID_SEMESTER']; ?></a>
                    <?php endforeach; ?>
                </div>
                <!-- <a class=" nav-link <?php echo $klikMenu ==  '3' ? 'active' : ''; ?>" aria-current="page" href="/adm/snk/eksul/<?= $idNISN; ?>/1">Nilai Ekstrakurikuler</a> -->
            </li>
            <li class="nav-item">
                <a class=" nav-link <?php echo $klikMenu ==  '4' ? 'active' : ''; ?>" aria-current="page" href="/adm/snk/kepribadian/<?= $idNISN; ?>">Nilai Kepribadian</a>
            </li>
            <li class="nav-item">
                <a class=" nav-link <?php echo $klikMenu ==  '5' ? 'active' : ''; ?>" aria-current="page" href="/adm/snk/absensi/<?= $idNISN; ?>">Absensi</a>
            </li>
            <li class="nav-item">
                <a class=" nav-link <?php echo $klikMenu ==  '6' ? 'active' : ''; ?>" aria-current="page" href="/adm/snk/keshatan/<?= $idNISN; ?>">Kesehatan</a>
            </li>
        </ul>
    </div>
</div>