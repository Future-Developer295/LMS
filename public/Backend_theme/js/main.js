function eaEnsureUiRoot() {
  if (!document.getElementById('toastStack')) {
    const stack = document.createElement('div');
    stack.className = 'toast-stack';
    stack.id = 'toastStack';
    document.body.appendChild(stack);
  }
  if (!document.getElementById('confirmModal')) {
    const overlay = document.createElement('div');
    overlay.className = 'modal-overlay';
    overlay.id = 'confirmModal';
    overlay.innerHTML = '' +
      '<div class="modal">' +
      '  <div class="modal-icon"><i class="fa-solid fa-trash-can"></i></div>' +
      '  <h3 id="confirmModalTitle">Delete this item?</h3>' +
      '  <p id="confirmModalMessage">This action cannot be undone.</p>' +
      '  <div class="modal-actions">' +
      '    <button class="btn btn-secondary" id="confirmModalCancel" type="button">Cancel</button>' +
      '    <button class="btn btn-danger-solid" id="confirmModalOk" type="button">Delete</button>' +
      '  </div>' +
      '</div>';
    document.body.appendChild(overlay);
    overlay.addEventListener('click', function (e) {
      if (e.target === overlay) eaCloseConfirmModal();
    });
    document.getElementById('confirmModalCancel').addEventListener('click', eaCloseConfirmModal);
  }
}

function eaCloseConfirmModal() {
  const overlay = document.getElementById('confirmModal');
  if (overlay) overlay.classList.remove('open');
}

function eaConfirmAction(options, onConfirm) {
  eaEnsureUiRoot();
  const overlay = document.getElementById('confirmModal');
  document.getElementById('confirmModalTitle').textContent = options.title || 'Delete this item?';
  document.getElementById('confirmModalMessage').textContent = options.message || 'This action cannot be undone.';
  const okBtn = document.getElementById('confirmModalOk');
  okBtn.textContent = options.confirmLabel || 'Delete';
  const newOkBtn = okBtn.cloneNode(true);
  okBtn.parentNode.replaceChild(newOkBtn, okBtn);
  newOkBtn.addEventListener('click', function () {
    eaCloseConfirmModal();
    if (typeof onConfirm === 'function') onConfirm();
  });
  overlay.classList.add('open');
}

function eaShowToast(message, type) {
  eaEnsureUiRoot();
  const stack = document.getElementById('toastStack');
  const toast = document.createElement('div');
  toast.className = 'toast' + (type === 'danger' ? ' danger' : '');
  const icon = type === 'danger' ? 'fa-circle-exclamation' : 'fa-circle-check';
  toast.innerHTML = '<i class="fa-solid ' + icon + '"></i><span>' + message + '</span>';
  stack.appendChild(toast);
  setTimeout(function () {
    toast.style.opacity = '0';
    toast.style.transition = 'opacity 0.25s ease';
    setTimeout(function () { toast.remove(); }, 250);
  }, 2600);
}

function eaRemoveRow(rowEl, onRemoved) {
  rowEl.style.transition = 'opacity 0.2s ease';
  rowEl.style.opacity = '0';
  setTimeout(function () {
    rowEl.remove();
    if (typeof onRemoved === 'function') onRemoved();
  }, 200);
}

document.addEventListener('DOMContentLoaded', eaEnsureUiRoot);
