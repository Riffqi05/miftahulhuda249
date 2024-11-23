<?php
session_start();
include '../includes/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
  <style>
          
        .drag-over {
            background-color: #bfdbfe; /* Warna biru muda */
        }
        .dragDrop-area {
            position: relative;
            width: 100%;
            height: 100px;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 8px;
        }
        .dragDrop-area img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 8px;
        }
        .delete-button {
            position: absolute;
            top: 8px;
            right: 8px;
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            border: none;
            border-radius: 50%;
            padding: 5px;
            cursor: pointer;
        }
        .text-blue-500 {
            color: #3b82f6;
        }
        input[type="file"] {
            display: none; /* Menyembunyikan input file */
        }
    </style>
      
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="bg-gray-800 text-white w-64 p-6 space-y-4">
            <h2 class="text-2xl font-semibold mb-6">Admin Dashboard</h2>
            <nav class="space-y-4">
                <a href="?section=beranda" class="block py-2 px-4 rounded hover:bg-gray-700">Beranda</a>
                <a href="?section=program" class="block py-2 px-4 rounded hover:bg-gray-700">Program</a>
                <a href="?section=blog" class="block py-2 px-4 rounded hover:bg-gray-700">Blog</a>
                <a href="?section=fasilitas" class="block py-2 px-4 rounded hover:bg-gray-700">Fasilitas</a>
                <a href="?section=berita" class="block py-2 px-4 rounded hover:bg-gray-700">Berita</a>
                <a href="?section=galeri" class="block py-2 px-4 rounded hover:bg-gray-700">Galeri</a>
                <a href="?section=kontak" class="block py-2 px-4 rounded hover:bg-gray-700">Kontak</a>
                <a href="index.php" class="block py-2 px-4 rounded hover:bg-gray-700 text-red-500">Logout</a>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <div class="flex-coku p-6">    
            <h2 class="text-3xl font-semibold mb-6">Tambah Postingan Blog</h2>
            <a href="../dashboard.php?section=blog" class="text-blue-500 p-2 rounded mb-4 flex gap-2 hover:text-red-500  transition duration-300 ease-in-out "><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" /></svg><span>Kembali</span></a>
     <form action="submit_blog.php" method="POST" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="judul" class="block text-gray-700 mb-2">Judul Blog</label>
                <input type="text" name="judul" id="judul" class="w-full border border-gray-300 p-2 rounded"required>
            </div>
            <div id="preview-area" class="flex justify-center items-center">
            </div>
            <div class="mb-4"  id="drag-drop-container">
                <label for="thumbnail" class="block text-gray-700 mb-2">Thumbnail (Drag & Drop)</label>
                <div id="drop-area" class="border-dashed border-2 border-gray-300 p-2 rounded bg-gray-50 flex justify-center items-center cursor-pointer">
                    <input type="file" name="thumbnail" id="thumbnail" class="hidden" accept="image/*">
                    <div id="dragDrop-area" class="dragDrop-area">
                        <p id="drop-text" class="text-gray-500">Drag and drop an image or click to select</p>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <label for="content" class="block text-gray-700 mb-2">Konten</label>
                <textarea type="text" name="editor" id="editor" autofocus class="w-full border border-gray-300 p-2 rounded"></textarea>
            </div>
            <div class="mb-4">
                <label for="tags" class="block text-gray-700 mb-2">Tags</label>
                <div class="flex">
                    <input type="text" id="tags" class="w-full border border-gray-300 p-2 rounded">
                    <input type="text" name="tags" id="blog_tag" class="hidden w-full border border-gray-300 p-2 rounded">
                    <button  id="add_tag" type="button"class="bg-blue-500 pl-5 pr-5 text-white">Tambah</button>
                </div>
            <div id="tags-area" class="w-100 flex mt-2 flex-wrap"></div>
            </div>
            <div class="mb-4">
                <label for="url" class="block text-gray-700 mb-2">URL</label>
                <input type="text" name="url" id="url" class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 transition duration-300 ease-in-out">Submit</button>
        </form>
    </div>
<script src="blog_script.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/super-build/ckeditor.js"></script>
        <script>
          // This sample still does not showcase all CKEditor 5 features (!)
          // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
          CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
              // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
              toolbar: {
                  items: [
                      'exportPDF','exportWord', '|',
                      'findAndReplace', 'selectAll', '|',
                      'heading', '|',
                      'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                     'numberedList', 'todoList', '|',
                       '|',
                      'undo', 'redo',
                      '-',
                      'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor',  '|',
                      'alignment', '|',
                      'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                      'specialCharacters', 'horizontalLine', '|',
                      '|',
                      'sourceEditing'
                  ],
                  shouldNotGroupWhenFull: true
              },
              // Changing the language of the interface requires loading the language file using the <script> tag.
              // language: 'es',
              list: {
                  properties: {
                      styles: true,
                      startIndex: true,
                      reversed: true
                  }
              },
              // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
              heading: {
                  options: [
                      { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                      { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                      { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                      { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                      { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                      { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                      { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                  ]
              },
              // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
              placeholder: 'Deskripsi Tugas',
              // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
              fontFamily: {
                  options: [
                      'default',
                      'Poppins',
                      'Arial, Helvetica, sans-serif',
                      'Courier New, Courier, monospace',
                      'Georgia, serif',
                      'Lucida Sans Unicode, Lucida Grande, sans-serif',
                      'Tahoma, Geneva, sans-serif',
                      'Times New Roman, Times, serif',
                      'Trebuchet MS, Helvetica, sans-serif',
                      'Verdana, Geneva, sans-serif'
                  ],
                  supportAllValues: true
              },
              // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
              fontSize: {
                  options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                  supportAllValues: true
              },
              // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
              // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
              htmlSupport: {
                  allow: [
                      {
                          name: /.*/,
                          attributes: true,
                          classes: true,
                          styles: true
                      }
                  ]
              },
              // Be careful with enabling previews
              // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
              htmlEmbed: {
                  showPreviews: true
              },
              // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
              link: {
                  decorators: {
                      addTargetToExternalLinks: true,
                      defaultProtocol: 'https://',
                      toggleDownloadable: {
                          mode: 'manual',
                          label: 'Downloadable',
                          attributes: {
                              download: 'file'
                          }
                      }
                  }
              },
              // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
              mention: {
                  feeds: [
                      {
                          marker: '@',
                          feed: [
                              '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                              '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                              '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                              '@sugar', '@sweet', '@topping', '@wafer'
                          ],
                          minimumCharacters: 1
                      }
                  ]
              },
              // The "super-build" contains more premium features that require additional configuration, disable them below.
              // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
              removePlugins: [
                  // These two are commercial, but you can try them out without registering to a trial.
                  // 'ExportPdf',
                  // 'ExportWord',
                  'CKBox',
                  'CKFinder',
                  'EasyImage',
                  // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                  // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                  // Storing images as Base64 is usually a very bad idea.
                  // Replace it on production website with other solutions:
                  // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                  // 'Base64UploadAdapter',
                  'RealTimeCollaborativeComments',
                  'RealTimeCollaborativeTrackChanges',
                  'RealTimeCollaborativeRevisionHistory',
                  'PresenceList',
                  'Comments',
                  'TrackChanges',
                  'TrackChangesData',
                  'RevisionHistory',
                  'Pagination',
                  'WProofreader',
                  // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                  // from a local file system (file://) - load this site via HTTP server if you enable MathType
                  'MathType'
              ]
          });
      </script>
</body>
</html>
