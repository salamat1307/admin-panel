<template>
    <div class="card">
        <Chart type="line" :data="chartData" :options="chartOptions" class="h-[23rem]" />
    </div>
</template>

<script setup>
import { ref, onMounted, watch } from "vue";

onMounted(() => {
    chartData.value = setChartData();
    chartOptions.value = setChartOptions();
});

// Define props to accept only labels and data arrays
const props = defineProps({
    labels: {
        type: Array,
        required: true
    },
    visitors: {
        type: Array,
        required: true
    },    
    pageViews: {
        type: Array,
        required: true
    },    
});

const chartData = ref({});
const chartOptions = ref({});
    
// const setChartData = () => {
//     const documentStyle = getComputedStyle(document.body);
//     chartData.value = {
//         labels: props.labels,
//         datasets: [
//             {
//                 data: props.data,
//                 backgroundColor: shuffle(colors).value.slice(0, props.labels.length)                
//             }
//         ]
//     };
// };

const setChartData = () => {
    const documentStyle = getComputedStyle(document.documentElement);
    return {
        labels: props.labels,
        datasets: [
            {
                label: 'Посетители',
                data: props.visitors,
                fill: false,
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgb(255, 99, 132)',
                tension: 0.4
            },
            {
                label: 'Просмотры',
                data: props.pageViews,
                fill: false,
                borderColor: 'rgb(54, 162, 235)',
                backgroundColor: 'rgb(54, 162, 235)',
                tension: 0.4
            }
        ]
    };
};

const setChartOptions = () => {
    const documentStyle = getComputedStyle(document.documentElement);
    const textColor = documentStyle.getPropertyValue('--p-text-color');
    const textColorSecondary = documentStyle.getPropertyValue('--p-text-muted-color');
    const surfaceBorder = documentStyle.getPropertyValue('--p-content-border-color');

    return {
        maintainAspectRatio: false,
        aspectRatio: 0.6,
        plugins: {
            legend: {
                labels: {
                    color: textColor
                }
            }
        },
        scales: {
            x: {
                ticks: {
                    color: textColorSecondary
                },
                grid: {
                    color: surfaceBorder
                }
            },
            y: {
                ticks: {
                    color: textColorSecondary
                },
                grid: {
                    color: surfaceBorder
                }
            }
        }
    };
}

// Initialize chart data and options when the component is mounted
onMounted(() => {
    setChartData();
    setChartOptions();
});

// Update chartData when labels or data props change
watch([() => props.labels, () => props.data], setChartData);
</script>
