<!-- components/PieChart.vue -->
<template>
    <div class="">
        <Chart type="pie" :data="chartData" :options="chartOptions" class="w-full md:w-[23rem]" />
    </div>
</template>

<script setup>
import { ref, onMounted, watch } from "vue";

// Define props to accept only labels and data arrays
const props = defineProps({
    labels: {
        type: Array,
        required: true
    },
    data: {
        type: Array,
        required: true
    }
});

const colors = ref([
    '#3e70c9','#43b968','#20b9ae','#f59345','#f44236','#a567e2','#F18701',
    '#7678ED','#F25F5C','#FFE066','#247BA0','#70C1B3','#FF6978','#FFD972',
    '#FCAF58','#FF8C42','#4E598C','#1098F7','#60AFFF','#427AA1'
])

function shuffle(array) {
    var j, x, i;
    for (i = array.length; i; i--) {
        j = Math.floor(Math.random() * i);
        x = array[i - 1];
        array[i - 1] = array[j];
        array[j] = x;
    }    
    return array;
}

// Function to get a specified number of random colors
function getRandomColors(count) {
  // Shuffle and take a slice of the first `count` colors
  return shuffle([...colors.value]).slice(0, count);
}

const chartData = ref({});
const chartOptions = ref({});

const setChartData = () => {
    const documentStyle = getComputedStyle(document.body);
    chartData.value = {
        labels: props.labels,
        datasets: [
            {
                data: props.data,
                backgroundColor: getRandomColors(props.labels.length)
            }
        ]
    };
};

const setChartOptions = () => {
    const documentStyle = getComputedStyle(document.documentElement);
    const textColor = documentStyle.getPropertyValue('--p-text-color') || '#333';

    chartOptions.value = {
        plugins: {
            legend: {
                labels: {
                    usePointStyle: true,
                    color: textColor
                }
            }
        }
    };
};

// Initialize chart data and options when the component is mounted
onMounted(() => {
    setChartData();
    setChartOptions();
});

// Update chartData when labels or data props change
watch([() => props.labels, () => props.data], setChartData);
</script>
