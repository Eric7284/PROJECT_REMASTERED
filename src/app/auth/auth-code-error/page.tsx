import Link from "next/link";
import { Button } from "@/components/ui/button";

export default function AuthCodeErrorPage() {
  return (
    <section className="max-w-md mx-auto text-center">
      <h1 className="text-2xl font-semibold text-destructive">
        Authentication Error
      </h1>
      <p className="mt-2 text-muted-foreground">
        There was an error processing your authentication request. Please try
        again.
      </p>
      <div className="mt-6">
        <Button asChild>
          <Link href="/auth/login">Try Again</Link>
        </Button>
      </div>
    </section>
  );
}
