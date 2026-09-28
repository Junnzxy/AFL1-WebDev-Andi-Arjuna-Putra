<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="page-header">
    <div>
        <h1 class="page-title">Manajemen Office</h1>
        <p class="page-subtitle">Kelola data cabang kantor (Model: Office)</p>
    </div>
</div>

<?php if (isset($_GET['status']) && $_GET['status'] === 'added'): ?>
    <div class="alert alert-success">
        <i data-lucide="check-circle-2"></i>
        <span>Data kantor berhasil ditambahkan!</span>
    </div>
<?php endif; ?>

<?php if (isset($_GET['status']) && $_GET['status'] === 'deleted'): ?>
    <div class="alert alert-danger">
        <i data-lucide="trash-2"></i>
        <span>Data kantor berhasil dihapus!</span>
    </div>
<?php endif; ?>

<?php if (!empty($flashMessage ?? null)): ?>
    <div class="alert alert-<?= $flashType ?? 'danger' ?>">
        <i data-lucide="alert-circle"></i>
        <span><?= htmlspecialchars($flashMessage) ?></span>
    </div>
<?php endif; ?>

<div class="dashboard-grid">
    <!-- Form Tambah Kantor -->
    <div class="glass-card">
        <div class="card-header">
            <h2 class="card-title">
                <i data-lucide="building-2"></i>
                Tambah Office
            </h2>
        </div>
        <form action="index.php?page=office&action=store" method="POST">
            <div class="form-group">
                <label for="nama_kantor" class="form-label">Nama Kantor</label>
                <input type="text" id="nama_kantor" name="nama_kantor" class="form-control" placeholder="Contoh: UC Surabaya..." required>
            </div>
            
            <div class="form-group">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukkan alamat lengkap..." required>
            </div>

            <div class="form-group">
                <label for="kota" class="form-label">Kota</label>
                <input type="text" id="kota" name="kota" class="form-control" placeholder="Contoh: Surabaya..." required>
            </div>
            
            <div class="form-group">
                <label for="telepon" class="form-label">Nomor Telepon</label>
                <input type="text" id="telepon" name="telepon" class="form-control" placeholder="Contoh: 031-7451699..." required>
            </div>

            <button type="submit" class="btn btn-primary">
                <i data-lucide="plus"></i>
                <span>Simpan Office</span>
            </button>
        </form>
    </div>

    <!-- Tabel List Kantor -->
    <div class="glass-card">
        <div class="card-header">
            <h2 class="card-title">
                <i data-lucide="building"></i>
                List Office
            </h2>
            <span class="badge badge-indigo"><?= count($offices ?? []) ?> Total</span>
        </div>

        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Nama Kantor</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Telepon</th>
                        <th style="text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($offices)): ?>
                        <tr>
                            <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 2rem;">
                                Belum ada data kantor.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($offices as $index => $off): ?>
                            <tr>
                                <td><strong><?= $index + 1 ?></strong></td>
                                <td>
                                    <div style="font-weight: 600; color: #fff;"><?= htmlspecialchars($off['nama_kantor']) ?></div>
                                </td>
                                <td style="font-size: 0.85rem; color: var(--text-muted);"><?= htmlspecialchars($off['alamat']) ?></td>
                                <td><span class="badge badge-indigo"><?= htmlspecialchars($off['kota']) ?></span></td>
                                <td style="font-size: 0.875rem;"><?= htmlspecialchars($off['telepon']) ?></td>
                                <td style="text-align: right;">
                                    <a href="index.php?page=office&action=delete&id=<?= urlencode($off['id']) ?>" 
                                       class="btn btn-danger" 
                                       onclick="return confirm('Apakah Anda yakin ingin menghapus kantor ini?')">
                                        <i data-lucide="trash-2" style="width: 14px; height: 14px;"></i>
                                        <span>Delete</span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
