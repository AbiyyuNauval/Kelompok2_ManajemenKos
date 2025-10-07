<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="" />
  </head>
  <body>
    <section class="container">
      <header>Laporkan Keluhan Anda</header>
      <p>Untuk mempercepat penanganan keluhan Anda, Mohon lengkapi data kamar dan detail keluhan Anda.</p>
      <form action="#" class="form">
        <div class="input-box">
          <label>Nama</label>
          <input type="text" placeholder="" required />
        </div>
        <div class="column">
          <div class="input-box">
            <label>No.HP</label>
            <input type="number" placeholder="" required />
          </div>
          <div class="input-box">
            <label>Tanggal</label>
            <input type="date" placeholder="" required />
          </div>
        </div>
        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="gender" checked />
              <label for="check-male">Pria</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender" />
              <label for="check-female">Wanita</label>
            </div>
          </div>
        </div>
        <div class="input-box kost">
          <label>Detail Kost</label>
          <div class="column">
            <div class="select-box">
              <select>
                <option hidden>Lokasi Kost</option>
                <option>Pekanbaru</option>
                <option>Dumai</option>
                <option>Duri</option>
                <option>Minas</option>
              </select>
            </div>
            <input type="text" placeholder="Nama Kost" required />
          </div>
          <div class="column">
            <input type="text" placeholder="Lantai" required />
            <input type="number" placeholder="No.Kamar" required />
          </div>
          
        </div>
        <div class="message-box">
            <label>Detail Keluhan</label>
            <div class="column">
            <textarea type="text" placeholder=""></textarea>
          </div>
        <button>Kirim</button>
      </form>
    </section>
  </body>
</html>