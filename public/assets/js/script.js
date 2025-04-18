document.addEventListener("click", (event) => {
  for (let modalChildren of event.target.children) {
    if (event.target.tagName === "DIALOG" && modalChildren.tagName === "FORM") {
      event.target.close();
    }
  }
});

function checkAndUncheck(checkItem) {
  const labelSelected = checkItem.parentNode;

  if (checkItem.checked) {
    labelSelected.classList.add(
      "bg-(--french-rose)",
      "text-white",
      "hover:brightness-80"
    );
    labelSelected.classList.remove("hover:bg-(--thistle)");
    return;
  }

  labelSelected.classList.remove(
    "bg-(--french-rose)",
    "text-white",
    "hover:brightness-80"
  );
  labelSelected.classList.add("hover:bg-(--thistle)");
  return;
}

async function openModal(modalName) {
  const modalContainer = document.getElementById("modal-container");
  const modalHTML = await loadModal(modalName);

  cleanerModalContainer(modalContainer);

  modalContainer.innerHTML = modalHTML;

  const modal = document.getElementById(modalName);
  modal.showModal();
}

async function openModalEdit(modalName, itemId) {
  const modalContainer = document.getElementById("modal-container");
  const modalHTML = await loadModal(modalName, itemId);

  cleanerModalContainer(modalContainer);

  modalContainer.innerHTML = modalHTML;

  loadModalsScript(modalName);

  const modal = document.getElementById(modalName);
  modal.showModal();
}

async function openModalDelete(modalName, itemId) {
  const modalContainer = document.getElementById("modal-container");
  const modalHTML = await loadModalDelete(modalName, itemId);

  cleanerModalContainer(modalContainer);

  modalContainer.innerHTML = modalHTML;

  const modal = document.getElementById(modalName);
  modal.showModal();
}

function closeModal(modalName) {
  const modal = document.getElementById(modalName);
  modal.close();
}

function cleanerModalContainer(modalContainer) {
  const modalContainerChildren = modalContainer.children[0];

  if (modalContainerChildren) {
    modalContainer.innerHTML = "";
  }
}

async function loadModal(modalName, itemId = null) {
  let url = "";

  if (itemId) {
    url += `/${modalName}-edit?id=${itemId}`;
  } else {
    url += `/${modalName}-add`;
  }
  console.log(url);

  const response = await fetch(url);
  return await response.text();
}

async function loadModalDelete(modalName, itemId = null) {
  let url = `/${modalName}-delete?id=${itemId}`;

  const response = await fetch(url);
  return await response.text();
}

function loadModalsScript(modalName) {
  if (modalName === "education-modal") inProgressInitialize();
  if (modalName === "experience-modal") inProgressInitialize();
}

function inProgress(data) {
  const dateEnd = document.getElementById("date_end");

  if (data.checked) {
    dateEnd.setAttribute("disabled", "disabled");
  } else {
    dateEnd.removeAttribute("disabled");
  }
}

function inProgressInitialize() {
  const inProgressEl = document.getElementById("in_progress");
  const dateEnd = document.getElementById("date_end");

  if (inProgressEl.checked) dateEnd.setAttribute("disabled", "disabled");
}
