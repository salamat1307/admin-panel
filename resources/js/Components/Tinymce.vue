<template>
    <tinymce
      v-model="editorValue"
      api-key="97hbe3p8jnu8thbu8fcyfgws16uhvzjt7r2le0q45cqj3xnz"
      :init="tinymceinitialize"
    />
  </template>
    <script setup>
    import { ref, computed, watch, toRefs } from "vue";
    import Tinymce from "@tinymce/tinymce-vue";
    // Props
    const props = defineProps({
        modelValue: { type: String, default: "", required: false },
        height: { type: [Number, String], required: true },
    });
    
    // Emit
    const emit = defineEmits(["update:modelValue"]);
    // Reactive value for the editor
    const { modelValue } = toRefs(props);
    const editorValue = ref(modelValue.value);

    // Computed property for TinyMCE initialization
    const tinymceinitialize = computed(() => ({
        height: props.height,
        theme: "silver",
        relative_urls: false,
        convert_urls: false,
        remove_script_host: false,
        language: "ru",
        plugins: [
            "advlist",
            "autolink",
            "lists",
            "link",
            "image",
            "media",
            "charmap",
            "preview",
            "anchor",
            "searchreplace",
            "visualblocks",
            "fullscreen",
            "insertdatetime",
            "table",
            "help",
            "wordcount",
        ],
        draggable_modal: true,
        extended_valid_elements: "*[.*]",
        toolbar:
            "undo redo | casechange blocks | bold italic backcolor | " +
            "alignleft aligncenter alignright alignjustify | " +
            "bullist numlist outdent indent | removeformat | code table help",
        file_picker_callback: (callback, value, meta) => {
            const x =
            window.innerWidth ||
            document.documentElement.clientWidth ||
            document.getElementsByTagName("body")[0].clientWidth;
            const y =
            window.innerHeight ||
            document.documentElement.clientHeight ||
            document.getElementsByTagName("body")[0].clientHeight;

            tinymce.activeEditor.windowManager.openUrl({
            url: "/file-manager/tinymce5",
            title: "Laravel File manager",
            width: x * 0.8,
            height: y * 0.8,
            onMessage: (api, message) => {
                callback(message.content, { text: message.text });
            },
            });
        },
    }));

    // Watch for changes in props and update the editor value
    watch(modelValue, (newValue) => {
        editorValue.value = newValue;
    });

    // Emit updated value when editor content changes
    watch(editorValue, (newValue) => {
        emit("update:modelValue", newValue);
    });
  </script>