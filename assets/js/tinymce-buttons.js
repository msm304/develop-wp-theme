(function () {
  tinymce.create("tinymce.plugins.custom.btn", {
    init: function (ed, url) {
      ed.addButton("video", {
        title: "دکمه افزودن شورت کد ویدیو",
        // image: url + "/tinymce-icon-image/player.png",
        type: 'menubutton',
        text: 'شورت کدهای اختصاصی قالب',
        menu: [
          {icon:'code' ,text: 'افزودن لینک ویدیو', onclick: function () {ed.execCommand("mceInsertContent", false, '[free-video src=\"\"]');}},
        ],
        // onclick: function () {
        //   ed.execCommand("mceInsertContent", false, '[free-video src=\"\"]');
        // },
      });
      ed.addButton("quote", {
        title: "دکمه افزودن شورت کد نقل قول",
        image: url + "/tinymce-icon-image/quote.png",
        // type: 'menubutton',
        // text: 'نقل قول',
        onclick: function () {
          ed.execCommand("mceInsertContent", false, '[bq text="" quote=\"\"]');
        },
      });
    },
  });
  tinymce.PluginManager.add("video", tinymce.plugins.custom.btn);
  tinymce.PluginManager.add("quote", tinymce.plugins.custom.btn);
})();
