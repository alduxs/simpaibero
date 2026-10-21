 <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">



                    <div class="row">
                        <div class="col-md-6 text-center text-md-start">
                            ©
                            <script>document.write(new Date().getFullYear())</script> Simpa</span>
                        </div>

                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End of Main Content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->


    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendors.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Custom js -->
    <script src="{{ asset('assets/js/custom.js') }}" data-base-url="{{ url('/') }}"></script>

    <!-- Custom table -->
    <script>
        (() => {
            const translations = @json([
                'empty' => __('Nothing found.', [], 'es'),
                'deleteRow' => __('Are you sure you want to delete this row?', [], 'es'),
                'deleteMultipleRows' => __('Are you sure you want to delete these rows?', [], 'es'),
                'paginationInfo' => __('Showing :from to :to of :total :label', [], 'es'),
                'confirmDeletion' => __('Confirm Deletion', [], 'es'),
                'cancel' => __('Cancel', [], 'es'),
                'delete' => __('Delete', [], 'es'),
                'close' => __('Close', [], 'es'),
            ]);

            const localizeCustomTable = () => {
                const table = document.querySelector('[data-table-pagination-info="productos"]')?.closest('[data-table]');

                if (table) {
                    const paginationInfo = table.querySelector('[data-table-pagination-info]');
                    const match = paginationInfo?.textContent.match(/^Showing\s+(\d+)\s+to\s+(\d+)\s+of\s+(\d+)\s+(.+)$/);

                    if (match) {
                        paginationInfo.innerHTML = translations.paginationInfo
                            .replace(':from', `<span class="fw-semibold">${match[1]}</span>`)
                            .replace(':to', `<span class="fw-semibold">${match[2]}</span>`)
                            .replace(':total', `<span class="fw-semibold">${match[3]}</span>`)
                            .replace(':label', match[4]);
                    }

                    table.querySelectorAll('.no-results td').forEach((cell) => {
                        if (cell.textContent.trim() === 'Nothing found.') {
                            cell.textContent = translations.empty;
                        }
                    });
                }

                const modal = document.getElementById('confirm-delete-modal');

                if (!modal) {
                    return;
                }

                const title = modal.querySelector('.modal-title');

                if (title?.textContent.trim() === 'Confirm Deletion') {
                    title.textContent = translations.confirmDeletion;
                }

                const message = modal.querySelector('.modal-body p');
                const messageText = message?.textContent.trim();

                if (messageText === 'Are you sure you want to delete this row?' ||
                    messageText === 'Are you sure you want to delete these rows?') {
                    message.textContent = translations[messageText === 'Are you sure you want to delete this row?' ? 'deleteRow' : 'deleteMultipleRows'];
                }

                modal.querySelectorAll('[data-bs-dismiss="modal"]').forEach((button) => {
                    if (button.textContent.trim() === 'Cancel') {
                        button.textContent = translations.cancel;
                    }
                });

                const confirmButton = modal.querySelector('#confirm-delete');

                if (confirmButton?.textContent.trim() === 'Delete') {
                    confirmButton.textContent = translations.delete;
                }

                modal.querySelector('.btn-close')?.setAttribute('aria-label', translations.close);
            };

            const observer = new MutationObserver(localizeCustomTable);

            document.addEventListener('DOMContentLoaded', () => {
                localizeCustomTable();
                observer.observe(document.body, { childList: true, subtree: true });
            });
        })();
    </script>
	<script src="{{ asset('assets/js/pages/custom-table.js') }}"></script>

    <!-- Dashboard Page js -->
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>

    <!-- Tynimce -->
    <script src="{{ asset('assets/js/plugins/tinymce/tinymce.min.js') }}"></script>


    <!-- Google maps -->
    <script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8_03r9LkKX7DqnHDYfv8lbyvWH7gadwM&callback=initMap"></script>

    <!-- Custom js -->
    <script src="{{ asset('assets/js/custom-maps.js') }}" data-base-url="{{ url('/') }}"></script>
    <script src="{{ asset('assets/js/custom-points.js') }}" data-base-url="{{ url('/') }}"></script>
    <script src="{{ asset('assets/js/custom-related-products.js') }}" data-base-url="{{ url('/') }}"></script>

</body>

</html>
