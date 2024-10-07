// Non utilisé pour le moment

document.addEventListener("DOMContentLoaded", function() {
  const deleteButton = document.getElementById("iconeDeleteJS");
  deleteButton.addEventListener("click", function(event) {
      event.preventDefault();
      Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
      }).then((result) => {
          if (result.isConfirmed) {
              // Add the code to delete the article here
              fetch("{{ path('app_supprimer_panier', {id: element.plat.id}) }}", 
                {
                  method: 'POST',
                  headers: {
                      "X-Requested-With": XMLHttpRequest
                  }
              })
              .then(response => response.json())
              .then(data => {
                  console.log(data);
                  // Update the UI to reflect the deletion
                  // For example, you can remove the table row
                  // that corresponds to the deleted article
                  const tableRow = event.target.closest('tr');
                  tableRow.remove();
              })
              .catch(error => console.error(error));
          }
      });
      console.log("Button clicked!");
  });
});