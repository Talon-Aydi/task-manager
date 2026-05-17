export function sortingTasks() {
    const option = document.getElementById("sort-filter");
    const container = document.getElementById("task-container");

    if (option && container) {
        option.addEventListener("change", async () => {
            const selectedSort = option.value;

            try {
                const response = await fetch(`/?sort=${selectedSort}`, {
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                    },
                });

                const html = await response.text();
                container.innerHTML = html;
            } catch (error) {
                console.error("Failed to sort tasks:", error);
            }
        });
    }
}
