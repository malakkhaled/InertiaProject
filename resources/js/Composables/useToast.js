import Swal from "sweetalert2";
import { usePage } from "@inertiajs/vue3";
import { watch } from "vue";

export function useToast() {
    const page = usePage();

    watch(
        () => page.props.flash,
        (flash) => {
            if (flash?.success) {
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: flash.success, // الأفضل عرض رسالة الـ flash القادمة من الكونترولر مباشرة
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
            }
            if (flash?.error) {
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "error",
                    title: flash.error,
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
            }
        },
        { immediate: true, deep: true },
    );
}
