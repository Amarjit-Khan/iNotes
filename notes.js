    function deleteit(x) {
      let p = confirm("Are you sure ?");
      if (p) {
        document.location.href = "notes2.php?sl=" + x;
      }
    }

    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {


        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[0].innerText;
        description = tr.getElementsByTagName("td")[1].innerText;
        console.log("edit ", title, description);

        title_edit_id.value = title;
        desc_edit_id.value = description;
        snoEdit.value = e.target.id;
        console.log(e.target.id);

        var myModal = new bootstrap.Modal(document.getElementById('edit_modal_id'))
        myModal.toggle()

      })
    })
