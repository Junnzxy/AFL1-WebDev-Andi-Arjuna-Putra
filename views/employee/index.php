<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="page-header">
    <div>
        <h1 class="page-title">Manajemen Employee</h1>
        <p class="page-subtitle">Kelola data karyawan, jabatan, dan usia (Model: Employee)</p>
    </div>
</div>

<?php if (isset($_GET['status']) && $_GET['status'] === 'added'): ?>
    <div class="alert alert-success">
        <i data-lucide="check-circle-2"></i>
        <span>Data karyawan berhasil ditambahkan!</span>
    </div>
<?php endif; ?>

<?php if (isset($_GET['status']) && $_GET['status'] === 'deleted'): ?>
    <div class="alert alert-danger">
        <i data-lucide="trash-2"></i>
        <span>Data karyawan berhasil dihapus!</span>
    </div>
<?php endif; ?>

<?php if (!empty($flashMessage ?? null)): ?>
    <div class="alert alert-<?= $flashType ?? 'danger' ?>">
        <i data-lucide="alert-circle"></i>
        <span><?= htmlspecialchars($flashMessage) ?></span>
    </div>
<?php endif; ?>

<div class="dashboard-grid">
    <!-- Form Tambah Karyawan -->
    <div class="glass-card">
        <div class="card-header">
            <h2 class="card-title">
                <i data-lucide="user-plus"></i>
                Tambah Karyawan
            </h2>
        </div>
        <form action="index.php?page=employee&action=store" method="POST">
            <div class="form-group">
                <label for="nama" class="form-label">Nama Karyawan</label>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama..." required>
            </div>
            
            <div class="form-group">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan" class="form-control" placeholder="Masukkan jabatan (e.g. Admin, Developer)..." required>
            </div>
            
            <div class="form-group">
                <label for="usia" class="form-label">Usia (Tahun)</label>
                <input type="number" id="usia" name="usia" class="form-control" min="17" max="80" placeholder="Masukkan usia..." required>
            </div>

            <button type="submit" class="btn btn-primary">
                <i data-lucide="plus"></i>
                <span>Simpan Karyawan</span>
            </button>
        </form>
    </div>

    <!-- Tabel List Karyawan -->
    <div class="glass-card">
        <div class="card-header">
            <h2 class="card-title">
                <i data-lucide="list"></i>
                List Karyawan
            </h2>
            <span class="badge badge-indigo"><?= count($employees ?? []) ?> Total</span>
        </div>

        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Usia</th>
                        <th style="text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($employees)): ?>
                        <tr>
                            <td colspan="5" style="text-align: center; color: var(--text-muted); padding: 2rem;">
                                Belum ada data karyawan.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($employees as $index => $emp): ?>
                            <tr>
                                <td><strong><?= $index + 1 ?></strong></td>
                                <td>
                                    <div style="font-weight: 600; color: #fff;"><?= htmlspecialchars($emp['nama']) ?></div>
                                </td>
                                <td>
                                    <span class="badge badge-cyan"><?= htmlspecialchars($emp['jabatan']) ?></span>
                                </td>
                                <td><?= htmlspecialchars($emp['usia']) ?> Thn</td>
                                <td style="text-align: right;">
                                    <a href="index.php?page=employee&action=delete&id=<?= urlencode($emp['id']) ?>" 
                                       class="btn btn-danger" 
                                       onclick="return confirm('Apakah Anda yakin ingin menghapus karyawan ini?')">
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
