import Link from "next/link";

import { Menu, Sparkle } from "lucide-react";

import { Button } from "@/components/ui/button";
import {
  NavigationMenu,
  NavigationMenuItem,
  NavigationMenuLink,
  NavigationMenuList,
} from "@/components/ui/navigation-menu";
import {
  Sheet,
  SheetContent,
  SheetHeader,
  SheetTitle,
  SheetTrigger,
} from "@/components/ui/sheet";

import AuthButton from "@/components/auth-button";

interface MenuItem {
  title: string;
  url: string;
}

const NAV_MENU_ITEMS: MenuItem[] = [
  { title: "Home", url: "/" },
  {
    title: "Client",
    url: "/client",
  },
  {
    title: "Server",
    url: "/server",
  },
  {
    title: "Profile",
    url: "/profile",
  },
];

export default function Nav() {
  return (
    <section className="p-4 border-b">
      <div className="container mx-auto">
        {/* Desktop Menu */}
        <nav
          className="hidden justify-between lg:flex"
          aria-label="Main navigation"
        >
          <div className="flex items-center gap-6">
            <Logo />
            <div className="flex items-center">
              <NavigationMenu>
                <NavigationMenuList>
                  {NAV_MENU_ITEMS.map((item) => renderMenuItem(item))}
                </NavigationMenuList>
              </NavigationMenu>
            </div>
          </div>

          <AuthButton />
        </nav>

        {/* Mobile Menu */}
        <div className="block lg:hidden">
          <div className="flex items-center justify-between">
            <Logo />
            <Sheet>
              <SheetTrigger asChild>
                <Button
                  variant="outline"
                  size="icon"
                  aria-label="Open navigation menu"
                >
                  <Menu className="size-4" />
                </Button>
              </SheetTrigger>
              <SheetContent className="overflow-y-auto">
                <SheetHeader>
                  <SheetTitle>
                    <Logo />
                  </SheetTitle>
                </SheetHeader>
                <nav
                  className="flex flex-col gap-2 p-4"
                  aria-label="Mobile navigation"
                >
                  {NAV_MENU_ITEMS.map((item) => renderMobileMenuItem(item))}

                  <div className="pt-4 border-t">
                    <AuthButton />
                  </div>
                </nav>
              </SheetContent>
            </Sheet>
          </div>
        </div>
      </div>
    </section>
  );
}

const Logo = () => {
  return (
    <Link href="/" className="flex items-center gap-2">
      <Sparkle className="size-5" />
      <span className="text-lg font-semibold tracking-tighter">SHSF</span>
    </Link>
  );
};

const renderMenuItem = (item: MenuItem) => {
  return (
    <NavigationMenuItem key={item.title}>
      <NavigationMenuLink
        href={item.url}
        className="group inline-flex h-10 w-max items-center justify-center rounded-md bg-background px-4 py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground focus:outline-none disabled:pointer-events-none disabled:opacity-50"
      >
        {item.title}
      </NavigationMenuLink>
    </NavigationMenuItem>
  );
};

const renderMobileMenuItem = (item: MenuItem) => {
  return (
    <Link
      key={item.title}
      href={item.url}
      className="text-md font-semibold px-4 py-2 rounded-md hover:bg-accent hover:text-accent-foreground transition-colors"
    >
      {item.title}
    </Link>
  );
};
