<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Manager</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container mt-4">
  <h2>Contact Manager</h2>
  <div class="mb-3">
    <input type="text" id="search" class="form-control" placeholder="Search by name or notes">
  </div>
  <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addModal">Add Contact</button>
  <a href="export.php" class="btn btn-secondary mb-2">Export CSV</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Notes</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="contactTable"></tbody>
  </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Contact</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="addForm">
          <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
          <input type="text" name="phone" class="form-control mb-2" placeholder="Phone">
          <input type="email" name="email" class="form-control mb-2" placeholder="Email">
          <textarea name="notes" class="form-control mb-2" placeholder="Notes"></textarea>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Contact</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="editForm">
          <input type="hidden" name="id">
          <input type="text" name="name" class="form-control mb-2" required>
          <input type="text" name="phone" class="form-control mb-2">
          <input type="email" name="email" class="form-control mb-2">
          <textarea name="notes" class="form-control mb-2"></textarea>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
function fetchContacts(query = '') {
  $.get('fetch.php', { search: query }, function(data) {
    $('#contactTable').html(data);
  });
}

$(document).ready(function() {
  fetchContacts();

  $('#search').on('input', function() {
    fetchContacts($(this).val());
  });

  $('#addForm').on('submit', function(e) {
    e.preventDefault();
    $.post('add.php', $(this).serialize(), function() {
      $('#addModal').modal('hide');
      fetchContacts();
      $('#addForm')[0].reset();
    });
  });

  $(document).on('click', '.editBtn', function() {
    const row = $(this).closest('tr');
    $('#editForm [name=id]').val($(this).data('id'));
    $('#editForm [name=name]').val(row.find('.name').text());
    $('#editForm [name=phone]').val(row.find('.phone').text());
    $('#editForm [name=email]').val(row.find('.email').text());
    $('#editForm [name=notes]').val(row.find('.notes').text());
    new bootstrap.Modal(document.getElementById('editModal')).show();
  });

  $('#editForm').on('submit', function(e) {
    e.preventDefault();
    $.post('edit.php', $(this).serialize(), function() {
      $('#editModal').modal('hide');
      fetchContacts();
    });
  });

  $(document).on('click', '.deleteBtn', function() {
    if (confirm('Are you sure?')) {
      $.get('delete.php', { id: $(this).data('id') }, fetchContacts);
    }
  });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
