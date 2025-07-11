import AppLayout from '@/layouts/app-layout';
import { Button } from '@headlessui/react';
import { Head } from '@inertiajs/react';
import { PlusIcon } from 'lucide-react';

const breadcrumbs = [
    {
        title: 'User',
        href: '/user',
    },
];

export default function User() {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Users" />
            <div className="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
                <div className="border-sidebar-border/70 dark:border-sidebar-border relative min-h-[100vh] flex-1 overflow-hidden rounded-xl border md:min-h-min">
                    <div className="flex items-center justify-between px-4 lg:px-6">
                        <div className="flex items-center gap-2">
                            <Button variant="outline" size="sm">
                                <PlusIcon />
                                <span className="hidden lg:inline">Add User</span>
                            </Button>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
