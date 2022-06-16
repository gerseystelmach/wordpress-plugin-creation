<div class="redirection-list">
	<?php foreach ($redirection_list ?? [] as $index => $redirection) : ?>
        <div class="redirection">
            <label for="slug-<?= $index ?>">Slug</label>
            <input type="text" id="slug-<?= $index ?>" name="wp_best_redirection_manage_setting[<?= $index ?>][slug]" value="<?= isset($redirection['slug']) ? esc_attr($redirection['slug']) : '' ?>">
            <label for="redirection-<?= $index ?>">Redirection</label>
            <input type="text" id="redirection-<?= $index ?>" name="wp_best_redirection_manage_setting[<?= $index ?>][redirection]" value="<?= isset($redirection['slug']) ? esc_attr($redirection['slug']) : '' ?>">
            <a class="button button-action redirection-delete" data-redirection-id="<?= $index ?>">Supprimer</a>
        </div>
        <br>
	<?php endforeach ?>
</div>
<br>
<a class="button button-action redirection-add">Ajouter une redirection</a>

<script>
    const addRedirection = () => {
        const index = document.querySelectorAll('.redirection').length;
        const container = document.querySelector('.redirection-list');
        container.innerHTML += `
        <div class="redirection">
            <label for="slug-${index}">Slug</label>
            <input type="text" id="slug-${index}" name="wp_best_redirection_manage_setting[${index}][slug]" value="">
            <label for="redirection-${index}">Redirection</label>
            <input type="text" id="redirection-${index}" name="wp_best_redirection_manage_setting[${index}][redirection]" value="">
            <br>
        </div>
        <br>`;
    };
    const addBtn = document.querySelector('.redirection-add');
    addBtn.addEventListener('click', addRedirection);
    addBtn.click();
</script>