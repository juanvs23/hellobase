const footerForm = document.querySelector("#footer-form");
const blogForm = document.getElementById("gs_stone_blog_page_config");

const formLoading = (idForm, action) => {
  const loading = document.createElement("div");
  const form = document.querySelector(idForm);
  const loadingText = document.createElement("p");
  const savingText = document.createElement("p");
  const loadingTextContent = document.createTextNode("Guardando...");
  const savingTextContent = document.createTextNode("Guardado!");
  const ErrorTextContent = document.createTextNode("Error...");

  loading.setAttribute("class", "loading-container");

  if (action == "show") {
    loading.setAttribute("id", "loading");
    loadingText.setAttribute("class", "loading-text");
    loading.appendChild(loadingText);
    loadingText.appendChild(loadingTextContent);
    form.appendChild(loading);
  }
  if (action == "save") {
    savingText.setAttribute("class", "saving-text");
    savingText.appendChild(savingTextContent);
    document.querySelector(".loading-text").remove();
    document.querySelector(`${idForm} #loading`).appendChild(savingText);
  }
  if (action == "error") {
  }
  if (action == "delete") {
    document.querySelector(`${idForm} #loading`).remove();
  }
};

if (footerForm) {
  footerForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const hideFooter = footerForm.querySelector("#displayfooter");
    const getFooterId = footerForm.querySelector("#footer_template_id");
    const facebook_url = footerForm.querySelector("#facebook_url");
    const instagram_url = footerForm.querySelector("#instagram_url");
    const twitter_url = footerForm.querySelector("#twitter_url");
    const linkedin_url = footerForm.querySelector("#linkedin_url");
    const youtube_url = footerForm.querySelector("#youtube_url");
    const whatsapp_url = footerForm.querySelector("#whatsapp_url");
    /*
         "facebook_url"=>"https://www.facebook.com/gs_stone",
            "twitter_url"=>"",
            "instagram_url"=>"https://www.instagram.com/think_us.22/?igshid=YmMyMTA2M2Y%3D",
            "linkedin_url"=>"https://www.linkedin.com/in/think-us-b06ab823b/",
            "youtube_url"=>"",
            "whatsapp_url"=>"https://api.whatsapp.com/send?phone=573237978803&text=Me%20interesa%20saber%20sobre"
    */
    const security = footerForm.querySelector("#security").value;
    const action = footerForm.querySelector("#action").value;

    if (getFooterId.value != "") {
      const url = gs_stone_admin_ajax.admin_ajax;
      formLoading("#footer-form", "show");
      const formData = new FormData();
      formData.append("action", action);
      formData.append("security", security);
      formData.append("footer_template_id", getFooterId.value);
      formData.append("displayfooter", hideFooter.checked);
      formData.append("facebook_url", facebook_url.value);
      formData.append("twitter_url", twitter_url.value);
      formData.append("instagram_url", instagram_url.value);
      formData.append("linkedin_url", linkedin_url.value);
      formData.append("youtube_url", youtube_url.value);
      formData.append("whatsapp_url", whatsapp_url.value);
      fetch(url, {
        method: "POST",
        body: formData,
      })
        .then((res) => res.json())
        .then((res) => {
          console.log(res);
          formLoading("#footer-form", "save");
          setTimeout(() => {
            formLoading("#footer-form", "delete");
          }, 3000);
        });
    } else {
    }
  });
}
if (blogForm) {
  blogForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const is_menu_shadow = blogForm.querySelector("#is_menu_shadow");
    const is_white_menu = blogForm.querySelector("#is_white_menu");
    const text_blog = blogForm.querySelector("#text_blog");
    const security = blogForm.querySelector("#security").value;
    const action = blogForm.querySelector("#action").value;
    const elementor_id = blogForm.querySelector("#elementor_id");
    console.log(is_menu_shadow.checked, is_white_menu.checked, text_blog.value);
    if (text_blog.value != "") {
      const url = gs_stone_admin_ajax.admin_ajax;
      formLoading("#gs_stone_blog_page_config", "show");
      const formData = new FormData();
      formData.append("action", action);
      formData.append("security", security);
      formData.append("is_menu_shadow", is_menu_shadow.checked);
      formData.append("is_white_menu", is_white_menu.checked);
      formData.append("elementor_id", elementor_id.value);

      formData.append("text_blog", text_blog.value);
      fetch(url, {
        method: "POST",
        body: formData,
      })
        .then((res) => {
          return res.text();
        })
        .then((res) => {
          formLoading("#gs_stone_blog_page_config", "save");
          setTimeout(() => {
            formLoading("#gs_stone_blog_page_config", "delete");
          }, 3000);
        });
    }
  });
}
