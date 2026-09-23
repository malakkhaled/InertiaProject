import { ref, provide } from "vue";

export function useProvide() {
    // متغيرات الحالة العامة
    const modalIsOpen = ref(false);
    const isCreateMode = ref(false);
    const selectedTask = ref(null);

    // دالة لفتح المودال للـ Create
    const openCreateModal = () => {
        isCreateMode.value = true;
        selectedTask.value = null;
        modalIsOpen.value = true;
    };

    // دالة لفتح المودال للـ Edit (تستقبل المهمة)
    const openEditModal = (task) => {
        isCreateMode.value = false;
        selectedTask.value = task;
        modalIsOpen.value = true;
    };

    provide("modalIsOpen", modalIsOpen);
    provide("isCreateMode", isCreateMode);
    provide("selectedTask", selectedTask);
    provide("openCreateModal", openCreateModal);
    provide("openEditModal", openEditModal);

    // 2. إرجاعها لكي يستطيع الأب استخدامها أيضاً إن أراد
    return {
        modalIsOpen,
        isCreateMode,
        selectedTask,
        openCreateModal,
        openEditModal,
    };
}
