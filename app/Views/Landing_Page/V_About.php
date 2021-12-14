<!-- Konten -->
<center>
  <?php foreach ($Q_Pengaturan->getResultArray()  as $A_Pengaturan) : ?>
    <h2 class="judul-halaman"><b><?= $A_Pengaturan['Nama_Halaman']; ?></b>
    </h2>
  <?php endforeach; ?>
</center>
<!-- Wlcome-->
<div class="container About">
  <?php foreach ($Q_Konten_1->getResultArray()  as $A_Konten_1) : ?>
    <div class="row">
      <div class="col-5">
        <!-- <?php $v_img_1 =  $A_Konten_1['Asset_konten_3']; ?> -->
        <img src='/Landing_Page/img/<?= $A_Konten_1['Asset_konten_3']; ?>' alt="" class=" img-fluid about1">
      </div>
      <div class="col desk-about">
        <h3><?= $A_Konten_1['Judul_Konten_3']; ?></h3>
        <p><?= $A_Konten_1['Deskripsi_konten_3']; ?></p>
        <br>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<div class="konten2 ">
  <?php foreach ($Q_Konten_2->getResultArray()  as $A_Konten_2) : ?>
    <div class="container About2">
      <div class="row">
        <div class="col desk-about2">
          <h3><?= $A_Konten_2['Judul_Konten_3']; ?></h3>
          <p><?= $A_Konten_2['Deskripsi_konten_3']; ?></p>
          <br>
        </div>
        <div class="col-6">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $A_Konten_2['Asset_konten_3']; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          <!-- <img src="<?php echo base_url('/Landing_Page/img/husniati-salma-1mv17ruB42g-unsplash.jpg'); ?>" alt="" class="img-fluid about2-img"> -->
        </div>
      </div>
    <?php endforeach; ?>
    </div>



    <div class="konten3 ">
      <div class="container About3">
        <div class="row">
          <div class="col-6  product-div1 product-div2 ">
            <div class="div img-div1">
              <iframe class="Map-Frame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d681.2141621552092!2d112.714168610428!3d-7.427796073976581!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e3ff91611d5f%3A0x9e390ce4ca3f310a!2sSDN%20Sidokerto!5e0!3m2!1sid!2sid!4v1609030961531!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              <div class="text-view transition">
                <a href="https://goo.gl/maps/1MGWq2HoUsZJeuA39" class="link-navigasi" target="_blank">
                  <h4 class="map-hover">Klik untuk Navigasi</h4>
                </a>
              </div>
            </div>
          </div>
          <div class="col desk-about3">
            <h3 class="text-center"><b>Kontak</b></h3>
            <p class="text-center">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores dicta cum aperiam, tempora inventore consequatur temporibus
            </p><br>
            <h4 class="text-center">Alamat</h4>
            <p class="text-center"> Jl. Kesatrian No.18, Sono, Sidokerto, Kec. Buduran, Kabupaten Sidoarjo, Jawa Timur 61252 </p>
            <h4 class="text-center">Phone</h4>
            <p class="text-center"> (031) 8946469 </p>
            <h4 class="text-center">Email</h4>
            <p class="text-center"> sdn.sidokerto@yahoo.co.id </p>
            <br>
          </div>
        </div>
      </div>