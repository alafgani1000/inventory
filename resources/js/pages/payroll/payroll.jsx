import AppLayout from '@/layouts/app-layout';
import PayrollsLayout from '@/layouts/payrolls/layout';
import { Head } from '@inertiajs/react';

const breadcrumbs = [
    {
        title: 'Payroll',
        href: '/payroll',
    },
];

export default function Payroll() {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Payroll" />
            <PayrollsLayout>
                <div className="space-y-6"></div>
            </PayrollsLayout>
        </AppLayout>
    );
}
