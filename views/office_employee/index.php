<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="page-header">
    <div>
        <h1 class="page-title">Office Employees</h1>
        <p class="page-subtitle">Penugasan Karyawan ke Kantor Cabang (CHALLENGE: Office-Employee Relationship)</p>
    </div>
</div>

<?php if (isset($_GET['status']) && $_GET['status'] === 'added'): ?>
    <div class="alert alert-success">
        <i data-lucide="check-circle-2"></i>
        <span>Relasi Employee-Office berhasil disimpan!</span>
    </div>
<?php endif; ?>

<?php if (isset($_GET['status']) && $_GET['status'] === 'deleted'): ?>
    <div class="alert alert-danger">
        <i data-lucide="trash-2"></i>
        <span>Relasi Employee-Office berhasil dihapus!</span>
    </div>
<?php endif; ?>

<?php if (!empty($flashMessage ?? null)): ?>
    <div class="alert alert-<?= $flashType ?? 'danger' ?>">
        <i data-lucide="alert-circle"></i>
        <span><?= htmlspecialchars($flashMessage) ?></span>
    </div>
<?php endif; ?>

<div class="dashboard-grid">
    <!-- Form Assign Employee to Office -->
    <div class="glass-card">
        <div class="card-header">
            <h2 class="card-title">
                <i data-lucide="user-check"></i>
                Assign Employee to Office
            </h2>
        </div>
        <form action="index.php?page=office-employees&action=store" method="POST">
            <div class="form-group">
                <label for="employee_id" class="form-label">Employee</label>
                <select id="employee_id" name="employee_id" class="form-select" required>
                    <option value="" disabled selected>-- Pilih Employee --</option>
                    <?php foreach (($employees ?? []) as $emp): ?>
                        <option value="<?= htmlspecialchars($emp['id']) ?>">
                            <?= htmlspecialchars($emp['nama']) ?> (<?= htmlspecialchars($emp['jabatan']) ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="office_id" class="form-label">Office</label>
                <select id="office_id" name="office_id" class="form-select" required>
                    <option value="" disabled selected>-- Pilih Office --</option>
                    <?php foreach (($offices ?? []) as $off): ?>
                        <option value="<?= htmlspecialchars($off['id']) ?>">
                            <?= htmlspecialchars($off['nama_kantor']) ?> (<?= htmlspecialchars($off['kota']) ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" style="margin-top: 1rem;">
                <i data-lucide="save"></i>
                <span>SAVE</span>
            </button>
        </form>
    </div>

    <!-- Tabel Relasi Office Employees -->
    <div class="glass-card">
        <div class="card-header">
            <h2 class="card-title">
                <i data-lucide="link"></i>
                Data Office Employees
            </h2>
            <span class="badge badge-indigo"><?= count($officeEmployees ?? []) ?> Total</span>
        </div>

        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Employee</th>
                        <th>Office</th>
                        <th style="text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($officeEmployees)): ?>
                        <tr>
                            <td colspan="4" style="text-align: center; color: var(--text-muted); padding: 2rem;">
                                Belum ada relasi karyawan dan kantor.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($officeEmployees as $index => $rel): ?>
                            <tr>
                                <td><strong><?= $index + 1 ?></strong></td>
                                <td>
                                    <div style="font-weight: 600; color: #fff;"><?= htmlspecialchars($rel['employee_name']) ?></div>
                                    <div style="font-size: 0.75rem; color: var(--text-muted);"><?= htmlspecialchars($rel['employee_jabatan']) ?></div>
                                </td>
                                <td>
                                    <span class="badge badge-cyan"><?= htmlspecialchars($rel['office_name']) ?></span>
                                    <div style="font-size: 0.75rem; color: var(--text-muted); margin-top: 2px;"><?= htmlspecialchars($rel['office_city']) ?></div>
                                </td>
                                <td style="text-align: right;">
                                    <a href="index.php?page=office-employees&action=delete&id=<?= urlencode($rel['id']) ?>" 
                                       class="btn btn-danger" 
                                       onclick="return confirm('Apakah Anda yakin ingin menghapus relasi ini?')">
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
