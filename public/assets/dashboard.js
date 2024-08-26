// // Sidebar Toggle
// document.getElementById('sidebarToggle').addEventListener('click', function() {
//     const sidebar = document.getElementById('sidebar');
//     sidebar.classList.toggle('collapsed');
// });
//
// // Menü Tıklama Olayı - Güncellenmiş
// document.addEventListener('DOMContentLoaded', function() {
//     const menuItems = document.querySelectorAll('.menu-item');
//
//     menuItems.forEach(item => {
//         item.addEventListener('click', function() {
//             // Diğer menülerin dropdown menülerini kapat
//             menuItems.forEach(menu => {
//                 if (menu !== item) {
//                     menu.classList.remove('open');
//                 }
//             });
//
//             // Bu menünün dropdown menüsünü aç
//             item.classList.toggle('open');
//         });
//     });
// });
//
// // İçerik Yükleme - Birleştirildi
// function loadSection(sectionId) {
//     $.ajax({
//         url: `/admin/sections/${sectionId}`,
//         type: 'GET',
//         success: function(data) {
//             $('#content-section').html(data);
//         },
//         error: function(error) {
//             console.error('Section yüklenirken bir hata oluştu:', error);
//         }
//     });
// }
//
// // Formları Göster ve Kapat
// function showForm(formId) {
//     document.getElementById(formId).style.display = 'block';
// }
//
// function closeForm(formId) {
//     document.getElementById(formId).style.display = 'none';
// }
