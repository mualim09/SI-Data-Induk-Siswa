<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">

            </a>
        </div>

        <!-- Menu Samping 2 -->
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Menu Wali Kelas</span>
        </p>

        <ul class="navbar-nav flex-fill w-100 mb-2">
            <!-- Data Kelas -->
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item w-100">
                    <a class="nav-link" href="/wk/data_siswa">
                        <i class="fe fe-user fe-16"></i>
                        <span class="ml-3 item-text">Data Siswa</span>
                    </a>
                </li>
            </ul>

            <!-- Karyawan -->
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item dropdown">

                    <a href="#Karyawan" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-grid fe-16"></i>
                        <span class="ml-3 item-text">Nilai Mapel</span>
                    </a>

                    <ul class="collapse list-unstyled pl-4 w-100" id="Karyawan">
                        <?php foreach ($Mapel->getResultArray() as $O) : ?>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="/wk/nilai_mapel/<?= $O['ID_DETAIL_MAPEL']; ?>/<?= session()->get('SMT_1'); ?>">
                                    <span class="ml-1 item-text"><?= $O['NAMA_MAPEL']; ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                </li>


                <!-- Karyawan -->
                <!-- <li class="nav-item dropdown">
                    <a href="#Karyawan" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-user fe-16"></i>
                        <span class="ml-3 item-text">Karyawan</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="Karyawan">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="/adm/kry/JB_002"><span class="ml-1 item-text">Kepala Sekolah</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="/adm/kry/JB_003"><span class="ml-1 item-text">Guru</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="/adm/kry/JB_001"><span class="ml-1 item-text">Admin</span></a>
                        </li>

                    </ul>
                </li> -->
            </ul>

            <!-- Nilai Kesehatan -->
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item w-100">
                    <a class="nav-link" href="/wk/nilai_kesehatan/<?php echo  session()->get('SMT_1') ?>">
                        <i class="fe fe-grid fe-16"></i>
                        <span class="ml-3 item-text">Nilai Kesehatan</span>
                    </a>
                </li>
            </ul>

            <!-- Nilai Ekskul -->
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item w-100">
                    <a class="nav-link" href="/wk/nilai_ekskul/<?php echo  session()->get('SMT_1') ?>">
                        <i class="fe fe-grid fe-16"></i>
                        <span class="ml-3 item-text">Nilai Ekskul</span>
                    </a>
                </li>
            </ul>

            <!-- Nilai Kepribadian -->
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item w-100">
                    <a class="nav-link" href="/wk/nilai_kepribadian/<?php echo  session()->get('SMT_1') ?>">
                        <i class=" fe fe-grid fe-16"></i>
                        <span class="ml-3 item-text">Nilai Kepribadian</span>
                    </a>
                </li>
            </ul>

            <!-- Absensi -->
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item w-100">
                    <a class="nav-link" href="/wk/absensi/<?php echo  session()->get('SMT_1') ?>">
                        <i class="fe fe-activity fe-16"></i>
                        <span class="ml-3 item-text">Absensi</span>
                    </a>
                </li>
            </ul>

            <!-- Laporan -->
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item dropdown">

                    <a href="#laporan" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-info fe-16"></i>
                        <span class="ml-3 item-text">Laporan</span>
                    </a>

                    <ul class="collapse list-unstyled pl-4 w-100" id="laporan">
                        <?php foreach ($Mapel->getResultArray() as $O) : ?>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="/wk/laporan/<?= session()->get('SMT_1'); ?>/<?= $O['ID_DETAIL_MAPEL']; ?>">
                                    <span class="ml-1 item-text"><?= $O['NAMA_MAPEL']; ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>

            </ul>

    </nav>
</aside>