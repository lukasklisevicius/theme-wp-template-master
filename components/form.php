<form action="" class=" w-full contact-form md:grid md:grid-rows-max gap-4 " x-cloak x-data="contactForm" @submit.prevent="submit"
    novalidate>
    <div class="flex flex-col">
        <label for='name' class="text-white">Nome</label>
        <input type="text" class="bg-[#8AC6D0] border-white placeholder-white" name="name" required
            x-model="formData.name"
            :class="error && error.includes($el.getAttribute('name')) ? 'ring-2 ring-red-400' : ''"
            @change="error = error.filter(e => e != $el.getAttribute('name'))">
    </div>
    <div class="flex flex-col">
        <label for='lastname' class="text-white">Cognome</label>
        <input type="text" class="bg-[#8AC6D0] border-white placeholder-white" name="lastname"
            x-model="formData.lastname"
            :class="error && error.includes($el.getAttribute('name')) ? 'ring-2 ring-red-400' : ''"
            @change="error = error.filter(e => e != $el.getAttribute('name'))">
    </div>
    <div class="flex flex-col">
        <label for='email' class="text-white">E-mail</label>
        <input type="email" class="bg-[#8AC6D0] border-white placeholder-white" name="email" required
            x-model="formData.email"
            :class="error && error.includes($el.getAttribute('name')) ? 'ring-2 ring-red-400' : ''"
            @change="error = error.filter(e => e != $el.getAttribute('name'))">
    </div>
    <div class="flex flex-col">
        <label for='tel' class="text-white">Numero Di Telefono</label>
        <input type="tel" class="bg-[#8AC6D0] border-white placeholder-white" name="tel" x-model="formData.tel"
            :class="error && error.includes($el.getAttribute('name')) ? 'ring-2 ring-red-400' : ''"
            @change="error = error.filter(e => e != $el.getAttribute('name'))">
    </div>
    <div class="flex flex-col w-full md:col-span-2">
        <label for='field' class="text-white">Messaggio</label>
        <textarea class="bg-[#8AC6D0] border-white placeholder-white" name="message" class="md:col-span-2 resize-none"
            x-model="formData.message"
            :class="error && error.includes($el.getAttribute('name')) ? 'ring-2 ring-red-400' : ''"
            @change="error = error.filter(e => e != $el.getAttribute('name'))"></textarea>
    </div>
    
    <div class="md:col-span-2 flex justify-start items-center">
        
        <button class="uppercase mt-[20px] py-[10px] px-[30px] rounded-full bg-white py-[5px] px-[20px]" type="submit" x-text="buttonLabel" :disabled="loading"
            class="disabled:cursor-wait disabled:opacity-50"></button>
            <p :class="success ? '' : 'text-red-400'" class="font-korolev text-purple text-right px-[20px]" x-text="response"></p>
    </div>
</form>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('contactForm', () => ({
            formData: {
                name: '',
                lastname: '',
                email: '',
                tel: '',
                country: '',
                object: '',
                message: '',
                privacy: false
            },
            response: '',
            loading: false,
            success: false,
            error: [],
            buttonLabel: '<?php _e("Contatta", "yachting"); ?>',
            submit() {
                this.buttonLabel = '<?php _e("Inviando...", "yachting"); ?>'
                this.loading = true;
                this.response = ''

                fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        action: 'contatto_form',
                        ...this.formData
                    })
                })
                    .then((response) => {
                        if (!response.ok)
                            this.response = '<?php _e("Invio del messaggio fallito. Riprova", 'yachting'); ?>'
                        else {
                            response.json().then(data => {
                                this.success = data.success
                                this.response = data.message
                                this.error = data.error
                            });
                        }

                    })
                    .catch((error) => {
                        this.success = false
                        this.response = '<?php _e("Invio del messaggio fallito. Riprova", 'theme'); ?>'
                    })
                    .finally(() => {
                        this.loading = false;
                        this.buttonLabel = '<?php _e("Invia", "theme"); ?>'
                    })
            }
        }))
    })
</script>